@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Blog</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('blogs.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Author -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="author_id">Author <span class="text-danger">*</span></label>
                                    <select class="form-control @error('author_id') is-invalid @enderror" name="author_id"
                                        id="author_id" required>
                                        <option value="">Select Author</option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}"
                                                {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('author_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Title -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" id="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Excerpt -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea name="excerpt" id="excerpt" class="form-control" rows="2">{{ old('excerpt') }}</textarea>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="content">Content <span class="text-danger">*</span></label>
                                    <textarea name="content" id="content" class="summernote form-control @error('content') is-invalid @enderror"
                                        rows="6" required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Categories -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_ids">Categories</label>
                                    <select name="category_ids[]" id="category_ids" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ collect(old('category_ids'))->contains($category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Tags -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tag_ids">Tags</label>
                                    <select name="tag_ids[]" id="tag_ids" multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                {{ collect(old('tag_ids'))->contains($tag->id) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="published_at">Published At</label>
                                    <input type="datetime-local"
                                        class="form-control @error('published_at') is-invalid @enderror" name="published_at"
                                        id="published_at" value="{{ old('published_at') }}">
                                    @error('published_at')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                            <!-- Feature Image -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="feature_image">Feature Image</label>
                                    <input type="file" name="feature_image" class="form-control-file">
                                </div>
                            </div>

                            <!-- Is Published -->
                            <div class="col-md-6">
                                <div class="form-check mt-4">
                                    <input type="checkbox" class="form-check-input" name="is_published" id="is_published"
                                        value="1" {{ old('is_published', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_published">Publish Now</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="pt-3 pb-5">
                    <button type="submit" class="btn btn-success">Save Blog</button>
                    <a href="{{ route('blogs.index') }}" class="btn btn-outline-dark ml-2">Cancel</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('customJs')
    <!-- Multi-select Tag CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">

    <!-- Multi-select Tag JS -->
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>

    <!-- Summernote (already present) -->
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 250
            });

            // ✅ Initialize multi-select tag
            new MultiSelectTag('category_ids');
            new MultiSelectTag('tag_ids');
        });
    </script>


    <!-- Dropzone CSS -->

    <script>
        Dropzone.autoDiscover = false;
        const dropzone = $("#profile_image").dropzone({
            url: "{{ route('temp-images.create') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/jpg",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                $("#image_id").val(response.image_id);
            }
        });

        // Summernote init (optional for bio)
        $('.summernote').summernote({
            height: 250
        });

        $(function() {
            function togglePublishedAt() {
                if ($('#is_published').is(':checked')) {
                    $('#published_at').closest('.col-md-6').show();
                } else {
                    $('#published_at').closest('.col-md-6').hide();
                }
            }

            $('#is_published').on('change', togglePublishedAt);
            togglePublishedAt(); // initial check
        });
    </script>
@endsection

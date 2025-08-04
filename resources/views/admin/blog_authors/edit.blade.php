@extends('admin.layouts.app')
@section('content')

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Blog Author</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('blog_authors.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('blog_authors.update', $author->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $author->name) }}" required>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Email (optional)</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $author->email) }}">
                                </div>
                            </div>

                            <!-- Bio -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="bio">Bio</label>
                                    <textarea name="bio" id="bio" rows="5" class="summernote form-control" placeholder="Author biography...">{{ old('bio', $author->bio) }}</textarea>
                                </div>
                            </div>

                            <!-- Profile Image -->
                            <div class="col-md-4">
                                <div class="mb-1">
                                    <label for="profile_image">Profile Image</label>
                                    <input type="hidden" id="image_id" name="image_id">
                                    <div id="profile_image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop files here or click to upload.<br><br>
                                        </div>
                                    </div>
                                    @if ($author->profile_image)
                                        <div class="mt-2">
                                            <img src="{{ asset('uploads/authors/' . $author->profile_image) }}" alt="Profile Image" class="img-thumbnail" width="150">
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="pt-3 pb-5">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('blog_authors.index') }}" class="btn btn-outline-dark ml-2">Cancel</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('customJs')
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

        // Summernote init
        $('.summernote').summernote({
            height: 150
        });
    </script>
@endsection

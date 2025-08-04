@extends('admin.layouts.app')

@section('content')
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Home Third Section</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('home-third-sections.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('home-third-sections.update', $section->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <!-- Title -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $section->title) }}">
                                    <p class="error text-danger"></p>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote"
                                        placeholder="Description">{{ old('description', $section->description) }}</textarea>
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label for="image">Image</label>
                                    <input type="hidden" id="image_id" name="image_id">
                                    <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop image here or click to upload.<br><br>
                                        </div>
                                    </div>
                                    @if ($section->image)
                                        <p class="mt-2">Current Image:</p>
                                        <img src="{{ asset('uploads/home_third_sections/' . $section->image) }}"
                                            width="100" class="img-thumbnail">
                                    @endif
                                </div>
                            </div>

                            <!-- Logo Upload -->
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label for="logo">Logo</label>
                                    <input type="hidden" id="logo_id" name="logo_id">
                                    <div id="logo" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop logo here or click to upload.<br><br>
                                        </div>
                                    </div>
                                    @if ($section->logo)
                                        <p class="mt-2">Current Logo:</p>
                                        <img src="{{ asset('uploads/home_third_sections/' . $section->logo) }}"
                                            width="100" class="img-thumbnail">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="link">Link</label>
                                    <input type="text" name="link" id="link" class="form-control"
                                        placeholder="Link" value="{{ $section->link }}">
                                    <p class="error"></p>
                                </div>
                            </div>

                        </div> <!-- .row -->
                    </div> <!-- .card-body -->
                </div> <!-- .card -->

                <!-- Submit -->
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('home-third-sections.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('customJs')
    <script>
        Dropzone.autoDiscover = false;

        // Dropzone for image
        $("#image").dropzone({
            url: "{{ route('temp-images.create') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                $("#image_id").val(response.image_id);
            }
        });

        // Dropzone for logo
        $("#logo").dropzone({
            url: "{{ route('temp-images.create') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                $("#logo_id").val(response.image_id);
            }
        });
    </script>
@endsection

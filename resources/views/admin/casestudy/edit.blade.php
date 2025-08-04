@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Case Study</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('casestudy.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <form method="POST" action="{{ route('casestudy.update', $casestudy->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $casestudy->title }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" readonly name="slug" id="slug" class="form-control" value="{{ $casestudy->slug }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="excerpt">Excerpt</label>
                                <textarea name="excerpt" id="excerpt" class="form-control" required>{{ $casestudy->excerpt }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="summernote">{{ $casestudy->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-1">
                                <label for="image">Image</label>
                                <input type="hidden" id="image_id" name="image_id">
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br>Drop files here or click to upload.<br><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    @if ($casestudy->image)
                                    <img src="{{ asset('uploads/casestudies/' . $casestudy->image) }}" alt="Previous Image" style="max-width: 200px;">
                                    @else
                                    <p>No previous image</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('casestudy.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </div>
    </form>
</section>
@endsection

@section('customJs')
<script>
    $("#title").change(function() {
        var title = $(this).val();
        $.ajax({
            url: '{{ route("getSlug") }}',
            type: 'get',
            data: { title: title },
            dataType: 'json',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                if (response["status"] == true) {
                    $("#slug").val(response["slug"]);
                }
            },
            error: function() { console.log("Something went wrong"); }
        });
    });

    Dropzone.autoDiscover = false;
    const dropzone = $("#image").dropzone({
        init: function() {
            this.on('addedfile', function(file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        },
        url: "{{ route('temp-images.create') }}",
        maxFiles: 1,
        paramName: 'image',
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(file, response) {
            $("#image_id").val(response.image_id);
        }
    });
</script>
@endsection

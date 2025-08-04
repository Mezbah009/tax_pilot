@extends('admin.layouts.app')

@section('content')
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Client</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('clients.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <form method="POST" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Category Dropdown -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="client_category_id">Client Category</label>
                                    <select name="client_category_id" id="client_category_id" class="form-control">
                                        <option value="" disabled selected>Select Client Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $client->client_category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p class="error text-danger"></p>
                                </div>
                            </div>

                            <!-- Link Input -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="link">Link</label>
                                    <input type="text" name="link" id="link" class="form-control"
                                        value="{{ old('link', $client->link) }}">
                                    <p class="error text-danger"></p>
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="image">Logo</label>
                                    <input type="hidden" id="image_id" name="image_id">
                                    <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop files here or click to upload.<br><br>
                                        </div>
                                    </div>
                                </div>

                                @if (!empty($client->logo))
                                    <div>
                                        <img width="250" src="{{ asset('uploads/first_section/' . $client->logo) }}"
                                            alt="">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('clients.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('customJs')
    <script>
        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            url: "{{ route('temp-images.create') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                });
            },
            success: function(file, response) {
                $("#image_id").val(response.image_id);
            }
        });
    </script>
@endsection

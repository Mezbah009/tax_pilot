@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Practice</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('practices.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form method="POST" action="{{ route('practices.update', $practice->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Title -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           name="title" id="title" value="{{ old('title', $practice->title) }}" required>
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Excerpt -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea name="excerpt" id="excerpt" class="form-control" rows="2">{{ old('excerpt', $practice->excerpt) }}</textarea>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="summernote form-control @error('description') is-invalid @enderror"
                                              rows="6">{{ old('description', $practice->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Icon -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="icon">Icon Image</label><br>
                                    @if ($practice->icon)
                                        <img src="{{ asset($practice->icon) }}" width="40" class="mb-2" alt="Icon">
                                    @endif
                                    <input type="file" name="icon" class="form-control-file">
                                    @error('icon')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Feature Image -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="feature_image">Feature Image</label><br>
                                    @if ($practice->feature_image)
                                        <img src="{{ asset($practice->feature_image) }}" width="50" class="mb-2" alt="Feature">
                                    @endif
                                    <input type="file" name="feature_image" class="form-control-file">
                                    @error('feature_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="pt-3 pb-5">
                    <button type="submit" class="btn btn-success">Update Practice</button>
                    <a href="{{ route('practices.index') }}" class="btn btn-outline-dark ml-2">Cancel</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('customJs')
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 250
            });
        });
    </script>
@endsection

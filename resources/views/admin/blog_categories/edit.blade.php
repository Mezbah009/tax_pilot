@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Blog Category</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('blog_categories.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="{{ route('blog_categories.update', $blogCategory->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category Name <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $blogCategory->name) }}"
                            placeholder="Enter category name"
                            required
                        >
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer pt-3">
                    <button type="submit" class="btn btn-success">Update Category</button>
                    <a href="{{ route('blog_categories.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Edit Showcase</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('showcases.update', $showcase->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="number" class="form-control" name="year" value="{{ old('year', $showcase->year) }}" required>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $showcase->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Current Image</label><br>
                    @if (!empty($showcase->image))
                        <img src="{{ asset($showcase->image) }}" class="img-thumbnail mb-2" width="100" alt="Showcase Image">
                    @endif
                </div>

                <div class="form-group">
                    <label for="image">Change Image (optional)</label>
                    <input type="file" class="form-control-file" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Update Showcase</button>
                <a href="{{ route('showcases.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

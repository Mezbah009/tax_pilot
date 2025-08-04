@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Add Showcase</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('showcases.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="number" class="form-control" name="year" value="{{ old('year') }}" required>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Image (optional)</label>
                    <input type="file" class="form-control-file" name="image">
                </div>

                <button type="submit" class="btn btn-success">Save Showcase</button>
                <a href="{{ route('showcases.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

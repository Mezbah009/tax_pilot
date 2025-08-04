@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Edit Ai Solution Section</h2>
    <form action="{{ route('ai_solutions.update', $section->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Description</label>
            <textarea class="form-control" name="description">{{ $section->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Current Image</label><br>
            @if($section->image)
                <img src="{{ asset($section->image) }}" width="100" />
            @endif
        </div>
        <div class="mb-3">
            <label>New Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('ai_solutions.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

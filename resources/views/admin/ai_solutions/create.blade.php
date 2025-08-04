@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Add ai solutions Section</h2>
    <form action="{{ route('ai_solutions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('ai_solutions.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

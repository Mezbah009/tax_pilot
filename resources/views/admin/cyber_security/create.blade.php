@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Add Cyber Security Section</h2>
    <form action="{{ route('cyber_security.store') }}" method="POST" enctype="multipart/form-data">
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
        <a href="{{ route('cyber_security.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

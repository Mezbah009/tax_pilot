@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Section</h2>
        <form action="{{ route('aiSecondSection.update', $section->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $section->title }}">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $section->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Current Icon</label> <br>
                @if ($section->icon)
                    <img src="{{ asset($section->icon) }}" width="100" height="100">
                @else
                    No Image
                @endif
            </div>

            <div class="form-group">
                <label>Change Icon</label>
                <input type="file" name="icon" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('ai_solutions.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

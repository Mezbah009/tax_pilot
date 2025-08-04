@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blogs</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('blogs.create') }}" class="btn btn-success">Create Blog</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @include('admin.message')
            <div class="card">
                <div class="card-body table-responsive p-0">
                    @if ($blogs->count())
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Published</th>
                                    <th>Published At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $index => $blog)
                                    <tr>
                                        <td>{{ $blogs->firstItem() + $index }}</td>
                                        <td>
                                            @if (!empty($blog->feature_image))
                                                <img src="{{ asset('uploads/blogs/' . $blog->feature_image) }}"
                                                    class="img-thumbnail" alt="{{ $blog->name }}" width="50">
                                            @else
                                                <img src="{{ asset('admin-assets/img/default.png') }}" class="img-thumbnail"
                                                    alt="default image" width="50">
                                            @endif
                                        </td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->author->name ?? '-' }}</td>
                                        <td>
                                            @if ($blog->is_published)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-secondary">No</span>
                                            @endif
                                        </td>
                                        <td>{{ $blog->published_at ? $blog->published_at->format('d M Y') : '-' }}</td>

                                        <td>
                                            <a href="{{ route('blogs.edit', $blog->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                                                style="display: inline-block;"
                                                onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="p-4">No blogs found.</div>
                    @endif
                </div>

                <div class="card-footer clearfix">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog Tags</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('blog_tags.create') }}" class="btn btn-success">Add New Tag</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th width="150">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($blogTags as $key => $tag)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td>{{ $tag->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('blog_tags.edit', $tag->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('blog_tags.destroy', $tag->id) }}" method="POST"
                                            style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No blog tags found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Optional pagination -->
                    <div class="mt-3">
                        {{ $blogTags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

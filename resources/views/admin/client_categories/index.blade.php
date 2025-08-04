@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Categories</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('client_categories.create') }}" class="btn btn-primary">New Client Category</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @include('admin.message')

            <div class="card">
                <form action="" method="GET">
                    <div class="card-header">
                        <div class="card-title">
                            <button type="button" onclick="window.location.href='{{ route('client_categories.index') }}'"
                                class="btn btn-default btn-sm">Reset</button>
                        </div>
                        <div class="card-tools">
                            <div class="input-group" style="width: 250px;">
                                <input type="text" name="keyword" value="{{ Request::get('keyword') }}"
                                    class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card-body table-responsive p-0">
                    @if ($categories->count())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th width="100">Status</th>
                                    <th width="300">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + $categories->firstItem() }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <span class="badge bg-{{ $category->status ? 'success' : 'secondary' }}">
                                                {{ $category->status ? 'Active' : 'Deactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('client_categories.toggleStatus', $category->id) }}"
                                                class="btn btn-sm btn-warning">
                                                {{ $category->status ? 'Deactivate' : 'Activate' }}
                                            </a>

                                            <a href="{{ route('client_categories.edit', $category->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>

                                            <form action="{{ route('client_categories.destroy', $category->id) }}" method="POST"
                                                style="display:inline-block;"
                                                onsubmit="return confirm('Are you sure to delete?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="p-3">
                            <p class="text-center">No client categories found.</p>
                        </div>
                    @endif
                </div>

                <div class="card-footer clearfix">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Practices</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('practices.create') }}" class="btn btn-success">Create Practice</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @include('admin.message')
            <div class="card">
                <div class="card-body table-responsive p-0">
                    @if ($practices->count())
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Feature Image</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($practices as $index => $practice)
                                    <tr>
                                        <td>{{ $practices->firstItem() + $index }}</td>

                                        <td>
                                            @if ($practice->icon)
                                                <img src="{{ asset($practice->icon) }}" class="img-thumbnail" alt="Icon" width="40">
                                            @else
                                                <img src="{{ asset('admin-assets/img/default.png') }}" class="img-thumbnail" alt="Default Icon" width="40">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($practice->feature_image)
                                                <img src="{{ asset($practice->feature_image) }}" class="img-thumbnail" alt="Feature" width="50">
                                            @else
                                                <img src="{{ asset('admin-assets/img/default.png') }}" class="img-thumbnail" alt="Default Image" width="50">
                                            @endif
                                        </td>

                                        <td>{{ $practice->title }}</td>

                                        <td>
                                            <a href="{{ route('practices.edit', $practice->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('practices.destroy', $practice->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this practice?');">
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
                        <div class="p-4">No practices found.</div>
                    @endif
                </div>

                <div class="card-footer clearfix">
                    {{ $practices->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

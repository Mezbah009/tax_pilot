@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Our Journey</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('showcases.create') }}" class="btn btn-primary">Add New Journey</a>
                </div>
            </div>
        </div>
    </section>



    <section class="content">
        <div class="container-fluid">
            @include('admin.message')

            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Year</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($showcases as $showcase)
                                <tr>
                                    <td>{{ $showcase->id }}</td>
                                    <td>{{ $showcase->year }}</td>
                                    <td>{{ $showcase->title }}</td>
                                    <td>
                                        @if (!empty($showcase->image))
                                            <img src="{{ asset($showcase->image) }}" class="img-thumbnail" width="50"
                                                alt="{{ $showcase->title }}">
                                        @else
                                            <img src="{{ asset('admin-assets/img/default.png') }}" class="img-thumbnail"
                                                width="50" alt="default image">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('showcases.edit', $showcase->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('showcases.destroy', $showcase->id) }}" method="POST"
                                            style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $showcases->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

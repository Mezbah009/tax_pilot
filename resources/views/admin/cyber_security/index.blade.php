@extends('admin.layouts.app')
@section('content')
    <div class="container">

        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Cyber Security First Sections</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('secondSection.create') }}" class="btn btn-primary">Second Section</a>
                        <a href="{{ route('cyber_security.create') }}" class="btn btn-primary">First Section</a>
                        {{-- <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a> --}}
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>


        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        {{-- cyber sequrity  FIRST section --}}

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body table-responsive p-0">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ $section->id }}</td>
                                        <td>{{ $section->description }}</td>
                                        <td>
                                            @if ($section->image)
                                                <img src="{{ asset($section->image) }}" width="100" />
                                            @endif
                                        </td>
                                        <td>
                                            <a style="margin-bottom: 10px;" href="{{ route('cyber_security.edit', $section->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('cyber_security.destroy', $section->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    </section>



    {{-- END cyber sequrity  FIRST section --}}

    {{-- cyber sequrity  second section --}}

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Icon</th>
                                <th>Title</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($second_sections as $second_section)
                                <tr>
                                    <td>{{ $second_section->id }}</td>
                                    <td>
                                        {{-- <p>{{ $second_section->icon }}</p> <!-- Debugging: Show path --> --}}
                                        @if ($second_section->icon)
                                            <img src="{{ asset($second_section->icon) }}" width="50" height="50">
                                        @else
                                            No Image
                                        @endif
                                    </td>

                                    <td>{{ $second_section->title }}</td>

                                    <td>
                                        <a href="{{ route('secondSection.edit', $second_section->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('secondSection.destroy', $second_section->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </section>



    {{-- END cyber sequrity  second section --}}
@endsection

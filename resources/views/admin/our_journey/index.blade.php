@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Our Journey</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('journeys.create') }}" class="btn btn-primary">Add New Journey</a>
            </div>
        </div>
    </div>
</section>



<section class="content">
    <div class="container-fluid">
        <!-- Displaying success messages -->
        @include('admin.message')

        <!-- Card for the table -->
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Year</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($journeys as $journey)
                            <tr>
                                <td>{{ $journey->id }}</td>
                                <td>{{ $journey->year }}</td>
                                <td>{{ $journey->title }}</td>
                                <td>
                                    @if (!empty($journey->image))
                                        <img src="{{ asset($journey->image) }}" class="img-thumbnail" alt="{{ $journey->title }}" width="50">
                                    @else
                                        <img src="{{ asset('admin-assets/img/default.png') }}" class="img-thumbnail" alt="default image" width="50">
                                    @endif
                                </td>
                                <td>
                                    <!-- Edit button -->
                                    <a href="{{ route('journeys.edit', $journey->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <!-- Delete button with confirmation -->
                                    <a href="#" onclick="destroyJourney({{ $journey->id }})" class="btn btn-danger btn-sm ml-2">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination links -->
            <div class="card-footer clearfix">
                {{ $journeys->links() }}
            </div>
        </div>
    </div>
</section>

<script>
    // JavaScript function to confirm deletion
    function destroyJourney(id) {
        if (confirm('Are you sure you want to delete this journey?')) {
            // Proceed with the deletion (you can use a form or Ajax here to delete the journey)
            // Example: Submit a form for deletion (or you could use Ajax)
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>

<!-- Form for deleting a journey (hidden) -->
@foreach($journeys as $journey)
    <form id="delete-form-{{ $journey->id }}" action="{{ route('journeys.destroy', $journey->id) }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach
@endsection

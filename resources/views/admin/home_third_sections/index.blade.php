@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Home Third Sections</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('home-third-sections.create') }}" class="btn btn-primary">New Section</a>
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
                        <button type="button" onclick="window.location.href='{{ route('home-third-sections.index') }}'" class="btn btn-default btn-sm">Reset</button>
                    </div>
                    <div class="card-tools">
                        <div class="input-group" style="width: 250px;">
                            <input type="text" name="keyword" value="{{ Request::get('keyword') }}" class="form-control float-right" placeholder="Search">
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
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Image</th>
                            <th>Logo</th>
                            <th>Title</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($sections->isNotEmpty())
                            @foreach ($sections as $section)
                            <tr>
                                <td>{{ $section->id }}</td>
                                <td>
                                    @if(!empty($section->image))
                                        <img src="{{ asset('uploads/home_third_sections/' . $section->image) }}" class="img-thumbnail" alt="{{ $section->title }}" width="50">
                                    @else
                                        <img src="{{ asset('admin-assets/img/default.png') }}" class="img-thumbnail" alt="default image" width="50">
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($section->logo))
                                        <img src="{{ asset('uploads/home_third_sections/' . $section->logo) }}" class="img-thumbnail" alt="{{ $section->title }}" width="50">
                                    @else
                                        <img src="{{ asset('admin-assets/img/default.png') }}" class="img-thumbnail" alt="default image" width="50">
                                    @endif
                                </td>
                                <td>{{ $section->title }}</td>
                                <td>
                                    <a href="{{ route('home-third-sections.edit', $section->id) }}">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="#" onclick="destroySection({{ $section->id }})" class="text-danger w-4 h-4 mr-1">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No records found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                {{ $sections->links() }}
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
<script>
    function destroySection(id){
        var url = '{{ route("home-third-sections.delete", ":id") }}';
        url = url.replace(':id', id);

        if (confirm("Are you sure you want to delete?")) {
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status) {
                        window.location.reload();
                    } else {
                        alert(response.message || 'Something went wrong');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        }
    }
</script>

@endsection

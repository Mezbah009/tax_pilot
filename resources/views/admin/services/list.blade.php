@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Services</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('services.create') }}" class="btn btn-primary">New Services</a>
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
                            <button type="button" onclick="window.location.href='{{ route('services.index') }}'"
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
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($services->isNotEmpty())
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>
                                            @if (!empty($service->image))
                                                <img src="{{ asset('uploads/services/' . $service->image) }}"
                                                    class="img-thumbnail" alt="{{ $service->title }}" width="50">
                                            @else
                                                <img src="{{ asset('admin-assets/img/default.png') }}" class="img-thumbnail"
                                                    alt="default image" width="50">
                                            @endif
                                        </td>
                                        <td>{{ $service->title }}</td>
                                        <td>
                                            <a href="{{ route('services.edit', $service->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" onclick="destroyService({{ $service->id }})"
                                                class="text-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">No Service Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('customJs')
    <script>
        function destroyService(id) {
            var url = '{{ route('services.delete', 'ID') }}';
            var newUrl = url.replace("ID", id)
            if (confirm("Are you sure you want to delete?")) {
                $.ajax({
                    url: newUrl,
                    type: 'delete',
                    data: {},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response["status"]) {
                            window.location.href = "{{ route('services.index') }}";
                        }
                    }
                });
            }
        }
    </script>
@endsection

@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Case Studies</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('casestudy.create') }}" class="btn btn-primary">New Case Study</a>
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
                            <button type="button" onclick="window.location.href='{{ route('casestudy.index') }}'"
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
                            @if ($caseStudies->isNotEmpty())
                                @foreach ($caseStudies as $caseStudy)
                                    <tr>
                                        <td>{{ $caseStudy->id }}</td>
                                        <td>
                                            @if (!empty($caseStudy->image))
                                                <img src="{{ asset('uploads/casestudies/' . $caseStudy->image) }}"
                                                    class="img-thumbnail" alt="{{ $caseStudy->title }}" width="50">
                                            @else
                                                <img src="{{ asset('admin-assets/img/default.png') }}" class="img-thumbnail"
                                                    alt="default image" width="50">
                                            @endif
                                        </td>
                                        <td>{{ $caseStudy->title }}</td>
                                        <td>
                                            <a href="{{ route('casestudy.edit', $caseStudy->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" onclick="destroyCaseStudy({{ $caseStudy->id }})"
                                                class="text-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">No Case Studies Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $caseStudies->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('customJs')
    <script>
        function destroyCaseStudy(id) {
            var url = '{{ route('casestudy.delete', 'ID') }}';
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
                            window.location.href = "{{ route('casestudy.index') }}";
                        }
                    }
                });
            }
        }
    </script>
@endsection

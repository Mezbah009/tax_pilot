@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Jobs</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('jobs.create')}}" class="btn btn-primary">New Jobs</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        @include('admin.message')
        <div class="card">
            <form action="" method="GET">
                <div class="card-header">
                    <div class="card-title">
                        <button type="button" onclick="window.location.href='{{route("jobs.index")}}'"
                            class="btn btn-default btn-sm">reset</button>
                    </div>
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="keyword" value="{{Request::get('keyword')}}"
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
                            <th>designation</th>
                            <th>job_type</th>
                            <th>start_date</th>
                            <th>end_date</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($jobs->isNotEmpty())
                        @foreach ($jobs as $job)
                        <tr>
                            <td>{{$job->id}}</td>
                            <td>{{$job->designation}}</td>
                            <td>{{$job->job_type}}</td>
                            <td>{{$job->start_date}}</td>
                            <td>{{$job->end_date}}</td>

                            <td>
                                <a href="{{route('jobs.edit',$job->id)}}">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#" onclick="destroySection({{$job->id}})" class="text-danger w-4 h-4 mr-1">
                                    <svg wire:loading.remove.delay="" wire:target=""
                                        class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path ath fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{$jobs->links()}}

            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
@section('customJs')
<script>
    function destroySection(id){
            var url = '{{ route("jobs.delete", "ID") }}';

            var newUrl  = url.replace("ID",id)
            if (confirm("Are you sure you want to delete")) {
                $.ajax({
                    url: newUrl,
                    type: 'delete',
                    data: {},  // Fixed typo: 'data' instead of 'date'
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {  // Fixed typo: 'function' instead of 'funtion'
                        // Handle success response here
                        $("button[type=submit]").prop('disabled', false);
                        if (response["status"]) {
                            window.location.href = "{{route('jobs.index')}}";
                        } else {
                            // Handle other cases if needed
                        }
                    }  // Fixed typo: removed extra closing parenthesis
                });
            }

        }

</script>
@endsection

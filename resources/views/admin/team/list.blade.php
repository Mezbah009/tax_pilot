@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Team Members</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('team_members.create') }}" class="btn btn-primary">New Team Member</a>
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamMembers as $member)
                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>
                                        @if (!empty($member->image))
                                            <img src="{{ asset('uploads/users/' . $member->image) }}" class="img-thumbnail" alt="{{ $member->name }}" width="50">
                                        @else
                                            <img src="{{ asset('admin-assets/img/default.png') }}" class="img-thumbnail" alt="default image" width="50">
                                        @endif
                                    </td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->designation }}</td>
                                    <td>
                                        <a href="{{ route('team_members.edit', $member->id) }}">
                                            Edit
                                        </a>
                                        <a href="#" onclick="destroyTeamMember({{ $member->id }})" class="text-danger ml-2">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $teamMembers->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        function destroyTeamMember(id) {
            var url = '{{ route("team_members.delete", ":id") }}';
            url = url.replace(':id', id);

            if (confirm("Are you sure you want to delete this team member?")) {
                $.ajax({
                    url: url,
                    type: 'delete',
                    data: {},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status) {
                            window.location.href = "{{ route('team_members.index') }}";
                        } else {
                            // Handle error or other cases if needed
                        }
                    }
                });
            }
        }
    </script>
@endsection

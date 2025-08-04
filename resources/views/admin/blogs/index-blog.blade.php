@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Blog Comments</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body p-0">
                @if ($comments->count())
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Blog Title</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th>Replies</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $index => $comment)
                                <tr>
                                    <td>{{ $comments->firstItem() + $index }}</td>
                                    <td>{{ $comment->blog->title ?? 'N/A' }}</td>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->email ?? '-' }}</td>
                                    <td>{{ Str::limit($comment->comment, 100) }}</td>
                                    <td>
                                        @if ($comment->replies->count())
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($comment->replies as $reply)
                                                    <li>
                                                        <strong>{{ $reply->name }}:</strong>
                                                        {{ Str::limit($reply->comment, 80) }}
                                                        <br>
                                                        <small class="text-muted">{{ $reply->created_at->format('d M Y H:i') }}</small>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <em>No replies</em>
                                        @endif
                                    </td>
                                    <td>{{ $comment->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="p-3">
                        {{ $comments->links() }}
                    </div>
                @else
                    <div class="p-3">No comments found.</div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

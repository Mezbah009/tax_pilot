@php
    use Carbon\Carbon;
@endphp

<div id="comment-{{ $comment->id }}" class="comment {{ $comment->parent_id ? 'comment-reply' : '' }}">
    <div class="d-flex">
        <div class="comment-img">
            <img src="{{ asset('assets/img/blog/default-avatar.jpg') }}" alt="">
        </div>
        <div>
            <h5>
                <a href="#">{{ $comment->name }}</a>
                <a href="javascript:void(0);" onclick="setReply({{ $comment->id }})" class="reply">
                    <i class="bi bi-reply-fill"></i> Reply
                </a>
            </h5>
            <time datetime="{{ $comment->created_at->toDateString() }}">
                {{ Carbon::parse($comment->created_at)->format('d M, Y') }}
            </time>
            <p>{{ $comment->comment }}</p>
        </div>
    </div>

    @if ($comment->replies->count())
        @foreach ($comment->replies as $reply)
            @include('partials.comment', ['comment' => $reply])
        @endforeach
    @endif

</div>

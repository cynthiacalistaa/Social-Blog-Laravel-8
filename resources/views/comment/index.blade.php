@extends('layouts.main')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Comment</h4>
                </div>

                <div class="card-body">
                    @if($comment->isEmpty())
                        <p>There is nothing in here</p>
                    @else
                        @foreach ($comment as $comment)
                            <div class="comment-area-box media my-3 p-3 border">
                                @if ($comment->user->photo)
                                    <img src="{{ asset('storage/photos/' . $comment->user->photo) }}"
                                        class="avatar avatar-100 photo" width="100" height="100">
                                @else
                                    <img src="{{ asset('images/profile.jfif') }}" class="img-fluid float-left mr-3 mt-2" width="50" height="50">
                                @endif

                                <div class="media-body ml-4 mt-2">
                                    <h4 class="mb-0">{{ $comment->user->name }} </h4>
                                    <span class="date-comm font-sm text-capitalize text-color">
                                        <i class="ti-time mr-2"></i>{{ \Carbon\Carbon::parse($comment->created_at)->format('d F Y') }}
                                    </span>

                                    <div class="comment-content mt-3">
                                        @if (strlen($comment->body) > 150)
                                            {{ substr($comment->body, 0, 150) }} <span id="readMore{{ $comment->id }}" style="display:none;">
                                                {{ substr($comment->body, 150) }}
                                            </span>
                                            <a href="#" class="read-more" onclick="toggleReadMore({{ $comment->id }})">Read more</a>
                                        @else
                                            {{ $comment->body }}
                                        @endif
                                    </div>
                                    <div class="mt-3">
                                        <form action="{{ route('comment.destroy', $comment->id) }}" method="post" class="mr-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleReadMore(commentId) {
        var readMoreSpan = document.getElementById('readMore' + commentId);
        var readMoreLink = document.querySelector('.read-more');

        if (readMoreSpan.style.display === 'none') {
            readMoreSpan.style.display = 'inline';
            readMoreLink.innerHTML = 'Read less';
        } else {
            readMoreSpan.style.display = 'none';
            readMoreLink.innerHTML = 'Read more';
        }
    }
</script>

@endsection

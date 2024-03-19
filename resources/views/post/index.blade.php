@extends('layouts.main')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section class="single-block-wrapper section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="single-post">
                        <div class="post-header mb-5 text-center">
                            <div class="meta-cat">
                                <a class="post-category font-extra text-color text-uppercase font-sm letter-spacing-1"
                                    href="#">{{ $post->category }}</a>
                            </div>
                            <h2 class="post-title mt-2">
                                {{ $post->title }}
                            </h2>

                            <div class="post-meta">
                                <span class="text-uppercase font-sm letter-spacing-1 mr-3">by {{ $post->user->name }}</span>
                                <span
                                    class="text-uppercase font-sm letter-spacing-1">{{ \Carbon\Carbon::parse($post->created_at)->format('d F Y') }}</span>
                            </div>
                            <div class="post-featured-image mt-5">
                                <img src="{{ asset('storage/image/' . $post->image) }}" alt="post-image"
                                    class="img-fluid w-80" style="width: 800px;">>
                            </div>
                        </div>
                        <div class="post-body">
                            <div class="entry-content" style="text-align: justify;">
                                <p>{!! nl2br(e($post->body)) !!}</p>
                            </div>

                            <div class="post-tags py-4">
                                <a href="#">#{{ $post->category }}</a>
                            </div>


                            <div
                                class="tags-share-box center-box d-flex text-center justify-content-between border-top border-bottom py-3">

                                <span class="single-comment-o"><i class="fa fa-comment-o"></i>{{ $commentCount }}
                                    comment</span>

                                {{-- <div class="post-share">
                                    <span class="count-number-like">2</span>
                                    <a class="penci-post-like single-like-button"><i class="ti-heart"></i></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="post-author d-flex my-5">
                        <div class="author-img">
                            <img alt="" src="{{ asset('storage/photos/' . $post->user->photo) }}"
                                class="avatar avatar-100 photo" width="100" height="100">
                        </div>

                        <div class="author-content pl-4">
                            <h4 class="mb-3"><a href="#" title="" rel="author"
                                    class="text-capitalize">{{ $post->user->name }}</a>
                            </h4>
                            <p>
                                {{ $post->user->aboutme }}
                            </p>

                            <a target="_blank" class="author-social" href="#"><i class="ti-facebook"></i></a>
                            <a target="_blank" class="author-social" href="#"><i class="ti-twitter"></i></a>
                            <a target="_blank" class="author-social" href="#"><i class="ti-google-plus"></i></a>
                            <a target="_blank" class="author-social" href="#"><i class="ti-instagram"></i></a>
                            <a target="_blank" class="author-social" href="#"><i class="ti-pinterest"></i></a>
                            <a target="_blank" class="author-social" href="#"><i class="ti-tumblr"></i></a>
                        </div>
                    </div>
                    <div class="related-posts-block mt-5">
                        <h3 class="news-title mb-4 text-center">
                            You May Also Like
                        </h3>

                        <div class="row">
                            @foreach ($blog as $p)
                                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                                    <div class="post-block-wrapper">
                                        <a href="{{ route('post.show', ['id' => $p->id]) }}">
                                            <img class="img-thumbnail" src="{{ asset('storage/image/' . $p->image) }}"
                                                alt="post-thumbnail" style="width: 100px%; height: 200px;" />
                                        </a>
                                        <div class="post-content mt-3">
                                            <h5>
                                                <a
                                                    href="{{ route('post.show', ['id' => $p->id]) }}">{{ $p->title }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="comment-area my-5">
                        <h3 class="mb-4 text-center">{{ $commentCount }} Comments</h3>
                        @foreach ($comment as $c)
                            <div class="comment-area-box media">
                                @if ($c->user->photo)
                                    <img src="{{ asset('storage/photos/' . $c->user->photo) }}"
                                        class="avatar avatar-100 photo" width="100" height="100">
                                @else
                                    <img src="{{ asset('images/profile.jfif') }}" class="img-fluid float-left mr-3 mt-2" width="50" height="50">
                                @endif
                                <div class="media-body ml-4 mt-2">
                                    <h4 class="mb-0">{{ $c->user->name }} </h4>
                                    <span class="date-comm font-sm text-capitalize text-color">
                                        <i
                                            class="ti-time mr-2"></i>{{ \Carbon\Carbon::parse($c->created_at)->format('d F Y') }}
                                    </span>

                                    <div class="comment-content mt-3">
                                        @if (strlen($c->body) > 150)
                                            {{ substr($c->body, 0, 150) }} <span id="readMore{{ $c->id }}"
                                                style="display:none;">{{ substr($c->body, 150) }}</span>
                                            <a href="#" class="read-more"
                                                onclick="toggleReadMore({{ $c->id }})">Read more</a>
                                        @else
                                            {{ $c->body }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

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

                    </div>
                    <form method="POST" action="{{ route('comment.store', $post->id) }}"
                        class="comment-form mb-5 gray-bg p-5">
                        @csrf
                        <h3 class="mb-4 text-center">Leave a comment</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <textarea class="form-control mb-3" name="body" id="body" cols="30" rows="5"
                                    placeholder="Comment"></textarea>
                            </div>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Submit Message">
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

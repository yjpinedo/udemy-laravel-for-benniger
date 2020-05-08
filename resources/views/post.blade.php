@extends('layouts.blog-post')


@section('content-post')
    <!-- Post Content Column -->
    <div class="col-md-8">

        <!-- Title -->
        <h1 class="mt-4">{{ $post->title }}</h1>

        <!-- Author -->
        <p class="lead">
            by
            <a href="#">{{ $post->user->name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{ $post->created_at->format('l j \\, Y \\a\\t \\ h:i A') }}</p>

        <hr>

        @if($post->image)
            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{ asset($post->image->file) }}" alt="">
        @else
            <img class="img-fluid rounded" src="{{ asset('img/default-image.jpg') }}" alt="">
        @endif
        <hr>

        <!-- Post Content -->
        <p class="lead">{{ $post->body }}</p>

        <blockquote class="blockquote">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in
                <cite title="Source Title">Source Title</cite>
            </footer>
        </blockquote>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

        <hr>
        @auth
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        @endauth

        @if(count($comments) < 1)
            <div class="media mb-4">
                <div class="media-body">
                    Sin comentarios
                </div>
            </div>
        @else
            <!-- Single Comment -->
            @foreach($comments as $comment)
                <div class="media mb-4">
                    @if(isset($comment->fileUser) && file_exists(public_path() . '/' . $comment->fileUser))
                        <img width="50" class="d-flex mr-3 rounded-circle" src="{{ asset('/' . $comment->fileUser)}}" alt="">
                    @else
                        <img width="50" class="d-flex mr-3 rounded-circle" src="{{ asset('img/guest.png') }}" alt="">
                    @endif
                    <div class="media-body">
                        <h5 class="mt-0">{{ $comment->author }} <small>{{ $comment->created_at->diffForHumans() }}</small></h5>
                        {{ $comment->body }}
                        @if($comment->replies)
                            @foreach($comment->replies as $reply)
                                <div class="media mt-4">
                                    @if(isset($reply->fileUser) && file_exists(public_path() . '/' . $reply->fileUser))
                                        <img width="50" class="d-flex mr-3 rounded-circle" src="{{ asset('/' . $reply->fileUser)}}" alt="">
                                    @else
                                        <img width="50" class="d-flex mr-3 rounded-circle" src="{{ asset('img/guest.png') }}" alt="">
                                    @endif
                                    <div class="media-body">
                                        <h5 class="mt-0">{{ $reply->author }} <small class="text-black-50">{{ $reply->created_at->diffForHumans() }}</small></h5>
                                        {{ $reply->body }}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="media mt-2 d-flex justify-content-between align-items-center">
                            <div class="media-body">

                                <form action="{{ route('replies.reply') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                    <div class="input-group">

                                        <input id="body" type="text" name="body" placeholder="Type Message ..." class="form-control">
                                        <span class="input-group-append">
                                      <button type="submit" class="btn btn-primary"><i class="fas fa-comment-dots"></i></button>
                                    </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        @endif
    </div>
@endsection

@extends('layouts.blog-post')




@section('content')
    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Publicat : {{$post->created_at}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="/images/{{$post->photo->file}}" alt="">

        <hr>

        <!-- Post Content -->
        {{$post->body}}
        <hr>

        <!-- Blog Comments -->
        @if(Auth::check())
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">

                 {!! Form::textarea('body', null,['class'=>'form-control','rows'=>3]) !!}
            </div>
            <div class="form-group">
            {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
        @endif
        <hr>

        <!-- Posted Comments -->


        <!-- Comment -->
        @if(count($comments)>0)
            @foreach($comments as $comment)


        <div class="media">
            <a class="pull-left" href="#">
                <img height="50px" width="50px" class="media-object" src="/images/{{$comment->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at}}</small>
                </h4>
                {{$comment->body}}
                <div>
                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <div class="form-group">
                             {!! Form::label('body', 'Leave Reply:') !!}
                             {!! Form::text('body', null,['class'=>'form-control']) !!}
                        </div>
                    <div class="form-group">
                    {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>


                <!-- Nested Comment -->
                @if(count($comment->replies)>0)



                    @foreach($comment->replies as $reply)
                <div style="padding-left:25px" class="media">
                    @if($reply->is_active == 1)
                    <div class="media-body">
                        <h4 class="media-heading">{{$reply->author}}
                            <small>{{$reply->created_at}}</small>
                        </h4>
                        {{$reply->body}}
                    </div>
                </div>
                        @endif
                    @endforeach

                    @else
                    <p>No replies</p>
                    @endif
                <!-- End Nested Comment -->



            </div>
        </div>
            @endforeach
        @endif
    </div>





    @endsection
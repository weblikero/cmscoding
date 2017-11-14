@extends('layouts.admin')



@section('content')

    <div class="container">

        {!! Form::model($post,['method'=>'PATCH', 'action'=>['AdminPostsController@update',$post->id],'files'=>'true']) !!}

        <div>
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null,['class'=>'form-control']) !!}
        </div>

        <div>
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', [''=>'Choose options']+$categories,null,['class'=>'form-control']) !!}
        </div>

        <div>
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null,['class'=>'form-control']) !!}
        </div>

        <div>
            {!! Form::label('body', 'Body:') !!}
            {!! Form::text('body', null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Salveaza', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
        <div>
            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy',$post->id]]) !!}

            <div>
            <div class="form-group">
            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
            </div>
            </div>

            {!! Form::close() !!}

        </div>

        <div class="row">
            @include('layouts.inc.messages')

        </div>


    </div>

@endsection
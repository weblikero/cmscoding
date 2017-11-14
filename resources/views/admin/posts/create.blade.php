@extends('layouts.admin')



@section('content')



        {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store','files'=>'true']) !!}

        <div class="form-group">
             {!! Form::label('title', 'Title:') !!}
             {!! Form::text('title', null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
             {!! Form::label('category_id', 'Category:') !!}
             {!! Form::select('category_id', [''=>'Choose options']+$categories,null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
             {!! Form::label('photo_id', 'Photo:') !!}
             {!! Form::file('photo_id', null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
             {!! Form::label('body', 'Body:') !!}
             {!! Form::textarea('body', null,['class'=>'form-control', 'rows'=>3]) !!}
        </div>

        <div class="form-group">
        {!! Form::submit('Salveaza', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

        <div class="row">
            @include('layouts.inc.messages')

        </div>

    @endsection
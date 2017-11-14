@extends('layouts.admin')


@section('content')
    {!! Form::model($category,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update',$category->id]]) !!}

    <div class="form-group">
         {!! Form::label('name', 'Name:') !!}
         {!! Form::text('name', null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::submit('Actualizeaza', ['class'=>'btn btn-primary']) !!}
    </div>



    {!! Form::close() !!}



    @endsection
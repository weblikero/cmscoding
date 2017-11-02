@extends('layouts.admin')


@section('content')
    <h1>Create user</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store','files'=>'true']) !!}

    <div>
        <div>
           {!! Form::label('name', 'Name:') !!}
           {!! Form::text('name', null,['class'=>'form-control']) !!}
        </div>

        <div>
             {!! Form::label('email', 'Email:') !!}
             {!! Form::text('email', null,['class'=>'form-control']) !!}
        </div>

        <div>
             {!! Form::label('role_id', 'Role:') !!}
             {!! Form::select('role_id',[''=>'Choose option']+$roles,null,['class'=>'form-control']) !!}
        </div>

        <div>
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active',[0=>'Inactiv',1=>'Activ'],null,['class'=>'form-control']) !!}
        </div>

        <div class ="input-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null,['class'=>'input-group-btn input-group-addon']) !!}
        </div>
        <div>
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::submit('Salveaza', ['class'=>'btn btn-primary'])!!}
        </div>

    </div>

    {!!Form::close()!!}
@include('layouts.inc.messages')
    @endsection
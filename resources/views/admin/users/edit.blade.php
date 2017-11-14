@extends('layouts.admin')


@section('content')
    <h1>Edit user</h1>


    <div class="container">
        <div class="nav-justified">
            <a class="btn btn-primary"href="{{route('users.index')}}">Inapoi</a>
        </div>
        <div class="col-sm-3">

            <img class="img-rounded " height="200px" width="200px" src="/images/{{$user->photo ? $user->photo->file : 'no photo'}}">


        </div>
        <div class="col-sm-9">

            {!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=>'true']) !!}

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

                <div class="form-group" style="padding-top: 20px">
                    {!! Form::submit('Actualizeza', ['class'=>'btn btn-primary'])!!}
                </div>



            </div>
            {!!Form::close()!!}
        @if(Auth::user()->id != $user->id)
            <div>
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$user->id]]) !!}

                <div>
                <div class="form-group">
                {!! Form::submit('Sterge', ['class'=>'btn btn-danger'])!!}
                </div>
                </div>

                {!! Form::close() !!}


            </div>
        @endif
        </div>





    </div>



@include('layouts.inc.messages')
    @endsection
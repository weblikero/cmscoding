@extends('layouts.admin')



@section('content')
<h1>Media</h1>
<div>
    @if(Session::has('deleted_photo'))

        <p> {{session('deleted_photo')}}</p>

        @endif


</div>
@if(count($photos)>0)
<table class="table table-stripped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
          <th>File name</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>

    @foreach($photos as $photo)
      <tr>
        <td>{{$photo->id}}</td>
        <td><img width="150px" height="50px" src="/images/{{$photo->file}}"></td>
          <td>{{$photo->file}}</td>
        <td>{{$photo->created_at->diffForHumans()}}</td>
          <td>{!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy',$photo->id]]) !!}

          <div class="form-group">
          {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
          </div>

          {!! Form::close() !!}</td>
      </tr>
        @endforeach
    </tbody>
  </table>
    @else
    <h1>No media</h1>

    @endif


    @endsection
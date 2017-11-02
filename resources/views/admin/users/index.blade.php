@extends('layouts.admin')


@section('content')
<h1>Users index</h1>
@if (count($users)>0)
<table class="table table-stripped">
    <thead>
      <tr>
          <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
          <th>Status</th>
          <th>Created</th>
          <th>Updated</th>
      </tr>
    </thead>
    <tbody>

        @foreach($users as $user)
      <tr>
          <td><img src="/images/{{$user->photo ? $user->photo->file : 'No photo'}}" height="100px" width="100"</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
          <td>{{$user->is_active ==1 ? 'Activ' : 'Inactiv'}}</td>
          <td>{{$user->created_at->diffForHumans()}}</td>
          <td>{{$user->updated_at->diffForHumans()}}</td>
          <td><a href={{route('users.edit', $user->id)}} class="btn btn-primary">Edit</a></td>
      </tr>
      @endforeach


    </tbody>
  </table>
@else
    <h2>Nu exista utilizatori</h2>
@endif

    @endsection

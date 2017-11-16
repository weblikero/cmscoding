@extends('layouts.admin')


@section('content')
<h1>Posts</h1>
    @if(Session::has('deleted_post'))

        <p class="bg-danger">{{session('deleted_post')}}</p>

        @endif

    @if(Session::has('created_post'))
        <p class="bg-success">{{session('created_post')}}</p>
        @endif

    @if(Session::has('updated_post'))
        <p>{{session('updated_post')}}</p>

        @endif

    @if(count($posts)>0)
    <table class="table table-stripped">
        <thead>
          <tr>
            <th>Post ID</th>
              <th>Photo</th>
            <th>Owner</th>
              <th>Title</th>
              <th>Category</th>
            <th>Created</th>
              <th>Updated</th>
          </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
              <td><img height="100px" width="100px" src="/images/{{$post->photo ? $post->photo->file : 'http://placehold.it'}}"></td>
            <td>{{$post->user->name}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->category ? $post->category->name : 'FARA CATEGORIE'}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
              <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
              <td><a href="{{route('comments.show',$post->id)}}">View Comments</a></td>
              <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-danger">Edit</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>


    @else
        <h3 class="bg bg-danger">Nu exista posturi</h3>


    @endif


    @endsection
@extends('layouts.admin')


@section('content')
    <h1>Categories</h1>
    <div>
        @if(Session::has('deleted_category'))
        <p> {{session('deleted_category')}}</p>


            @endif


    </div>
<div class="col-sm-6">
    {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

    <div>
        <div class="form-group">
             {!! Form::label('name', 'Name:') !!}
             {!! Form::text('name', null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::submit('Creaza', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}
<div>@include('layouts.inc.messages')</div>
</div>
<div class="col-sm-6">
    @if(count($categories)>0)
        <table class="table table-stripped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('categories.edit', $category->id)}}" class="btn btn-default">Edit</a></td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy',$category->id]]) !!}

                                <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                </div>



                        {!! Form::close() !!}



                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    @else
        <h3 class="bg bg-danger">Nu exista categorii</h3>


    @endif



</div>


@endsection
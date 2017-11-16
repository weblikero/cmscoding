@extends('layouts.admin')



@section('content')
    <h1>Comments</h1>

    @if(count($comments)>0)

        <table class="table table-stripped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Post Title</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Active</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->post->title}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->is_active == 0 ? 'Inactiv' : 'Activ'}}</td>
                    <td>

                        @if($comment->is_active ==1)
                            {!! Form::model($comment,['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Dezactiveaza', ['class'=>'btn btn-primary btn-block']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::model($comment,['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Activeaza', ['class'=>'btn btn-primary btn-block']) !!}
                            </div>
                            {!! Form::close() !!}


                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    @else
        <p>Nu exista comentarii</p>


    @endif


@endsection
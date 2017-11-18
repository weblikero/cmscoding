@extends('layouts.admin')



@section('content')
    <h1>Replies</h1>

    @if(count($replies)>0)

        <table class="table table-stripped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Comm</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Active</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->comment->body}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td>{{$reply->is_active == 0 ? 'Inactiv' : 'Activ'}}</td>
                    <td>

                        @if($reply->is_active ==1)
                            {!! Form::model($reply,['method'=>'PATCH', 'action'=>['CommentRepliesController@update',$reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Dezactiveaza', ['class'=>'btn btn-primary btn-block']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::model($reply,['method'=>'PATCH', 'action'=>['CommentRepliesController@update',$reply->id]]) !!}
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
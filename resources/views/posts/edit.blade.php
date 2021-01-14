@extends('layouts.app')

@section('title', '| Edit Post')

@section('content')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Edit Post</h1>
        <hr>
            {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
            <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('catagory', 'Catagory') }}
            {{ Form::text('catagory', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('auther_name', 'Auther Name') }}
            {{ Form::text('auther_name', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('body', 'Post Body') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}
            <br>

            <div align="center"> 
            @can('Administer roles & permissions')
            Check this box to publish article => {!! Form::checkbox('publish', '1'); !!}
            <br/><br/>
            @endcan            

            @can('Edit Post')
            <h5 align="center" style="color: black; background-color: red; width: 300px;"> Read carefully before clicking on submit<h5>
            @endcan
            
            {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
            </div>

            {{ Form::close() }}
    </div>
    </div>
</div>

@endsection
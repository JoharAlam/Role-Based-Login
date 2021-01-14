@extends('layouts.app')

@section('title', '| View Post')

@section('content')

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-32"> 
      <h1><b>MY Articles</b></h1>
      <p>Welcome to the Articles of <span class="w3-tag">GlowLogix</span></p>
    </header>
</div>
        
        <div class="w3-row" style="/*margin-left: 360px;*/ width: 2220px;">
            <!-- Blog entries -->
            <div class="w3-col l8 s12">
              <!-- Blog entry -->
              <div class="w3-card-4 w3-margin w3-white">
                    <img src="{{ asset('storage/woods.jpg') }}" alt="Nature" style="width:100%; height: 500px">
                    <div class="w3-container" align="center"></br>
                        <div style="border: solid;">
                        <h3><b>Title: {{ $post->title }}</a></h3>
                        <h5>Auther Name: <u>{{ $post->auther_name}}</u></h5>
                        <h5>Catagory: <u>{{ $post->catagory}}</u></h5>
                        <h5>Upload Date: {{ $post->created_at }}</h5>
                    </div>
                    </div>
                    <hr>
                    <div class="w3-container" class="teaser">
                      <p><b><u><h3 style="margin-left: 25px;">Description:</h3></u><div align="center"><h4 style="text-align: justify; width: 1350px; line-height: 1.4;">{{ $post->body }}</h4></div></b></p></br><hr>
                      <div class="w3-row">
                            <div style="margin-left: 620px;" class="w3-col m8 s12">
                                {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a></b>
                                @canany(['Administer roles & permissions' , 'Edit Post'])
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info" role="button">Edit</a>
                                @endcanany
                                @canany(['Administer roles & permissions' , 'Delete Post'])
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                @endcanany
                                {!! Form::close() !!}
                            </div> 
                            </div>
                      </div>
                  </br>
                </div>
          </div>
          <hr> 
        </div>
    </body>
</html>

@endsection

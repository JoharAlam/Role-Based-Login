@extends('layouts.app')
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

<!-- Grid -->
@can('Administer roles & permissions')
    @foreach ($posts as $post)
                    
        <div class="w3-row" style="margin-left: 360px;">
            <!-- Blog entries -->
            <div class="w3-col l8 s12">
              <!-- Blog entry -->
              <div class="w3-card-4 w3-margin w3-white">
                    <img src="{{ asset('storage/woods.jpg') }}" alt="Nature" style="width:100%; height: 300px">
                    <div class="w3-container">
                      <h3><b>Title: <u>{{ $post->title }}</u></a></h3>
                      <h5>Auther Name: <u>{{ $post->auther_name}}</u></h5>
                      <h5>Catagory: <u>{{ $post->catagory}}</u></h5>
                      <h5>Upload Date: {{ $post->created_at }}</h5>
                    </div>

                    <hr>

                    <div class="w3-container" class="teaser">
                      <p><b><u>Description:</u> {{  Str::limit($post->body, 100) }} {{-- Limit teaser to 100 characters --}}</b></p><hr>
                      
                      <div class="w3-row" >
                            <div class="w3-col m8 s12">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info" role="button"><b>Show Post</b></a>
                                @if($post->publish == '0')
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success" role="button"><b>Publish Post</b></a>
                              @endif                              
                            </div>                            
                        </div>
                    </br>
                    </div>
                </div>
            </div>
            <hr> 
        </div>  

    @endforeach
@endcan

@can('Show Post')
    @foreach ($posts as $post)
      @if($post->publish == '1')
        <div class="w3-row" style="margin-left: 360px;">
            <!-- Blog entries -->
            <div class="w3-col l8 s12">
              <!-- Blog entry -->
              <div class="w3-card-4 w3-margin w3-white">
                    <img src="{{ asset('storage/woods.jpg') }}" alt="Nature" style="width:100%; height: 300px">
                    <div class="w3-container">
                      <h3><b>Title: <u>{{ $post->title }}</u></a></h3>
                      <h5>Auther Name: <u>{{ $post->auther_name}}</u></h5>
                      <h5>Catagory: <u>{{ $post->catagory}}</u></h5>
                      <h5>Upload Date: {{ $post->created_at }}</h5>
                    </div>

                    <hr>

                    <div class="w3-container" class="teaser">
                      <p><b><u>Description:</u> {{  Str::limit($post->body, 100) }} {{-- Limit teaser to 100 characters --}}</b></p><hr>
                      
                      <div class="w3-row" >
                            <div class="w3-col m8 s12">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info" role="button"><b>Show Post</b></a>                        
                            </div>                            
                        </div>
                    </br>
                    </div>
                </div>
            </div>
            <hr> 
        </div>  
        @endif
    @endforeach
@endcan
<!-- Introduction menu -->


<!-- Footer -->
 <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <div style="width: 150px; margin-left: 650px;">
     <div class="panel-heading" align="center" style="border: solid; border-radius: 50px;">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</div>
     
    </div>
    <div style="width: 150px; margin-left: 663px;">{!! $posts->links() !!}</div>
</footer>

</body>
</html>
@endsection

  
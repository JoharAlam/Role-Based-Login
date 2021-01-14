<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Session;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }

    public function index() {
        $posts = Post::orderby('id')->paginate(5); //show only 5 items at a time in descending order

        return view('posts.index', compact('posts'));
    }

    
    public function create() {
        return view('posts.create');
    }

    
    public function store(Request $request) 
    { 

    //Validating title and body field
        $this->validate($request, [
            'title'=>'required|max:100',
            'body' =>'required',
            ]);

        $title = $request['title'];
        $catagory = $request['catagory'];
        $auther = $request['auther_name'];
        $body = $request['body'];
        $publish = $request['publish'];

        $post = Post::create($request->only('title', 'catagory', 'auther_name', 'body', 'publish'));

    //Display a successful message upon save

        if($post->publish == '1')
        {
            return redirect()->route('posts.index', 
            $post->id)->with('flash_message', 
            'Article ('. $post->title.') is published successfully');
        }
        else
        {
            return redirect()->route('posts.index', 
            $post->id)->with('flash_message', 
            'Article ('. $post->title.') is submitted successfully');
        }
         
    }

    
    public function show($id) {
        $post = Post::findOrFail($id); //Find post of id = $id

        return view ('posts.show', compact('post'));
    }

    
    public function edit($id) {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title'=>'required|max:100',
            'body'=>'required',
        ]);
        $request->all();
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->catagory = $request->input('catagory');
        $post->auther_name = $request->input('auther_name');
        $post->body = $request->input('body');
        if($request->publish == '1')
        {
            $post->publish = $request->publish;
        }
        else
        {
            $post->publish = '0';
        }
        
        $post->save();

        if($post->publish == '1')
        {
            return redirect()->route('posts.index')->with('flash_message', 
            'Article ('. $post->title.') is updated and published successfully');
        }
        else
        {
            return redirect()->route('posts.index')->with('flash_message', 
            'Article ('. $post->title .') is updated and submitted successfully');
        }
        


    }

    
    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('flash_message',
             'Article ('. $post->title .') is deleted successfully');

    }

}

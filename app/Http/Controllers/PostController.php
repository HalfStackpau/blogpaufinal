<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user()->id;
        $validate = $request->validate([
            'title'=>'string|required',
            'comment'=>'string|required',
            'tags'=>'string|required'
        ]);
        $create = Post::create([
            'title'=>$validate['title'],
            'comment'=> $validate['comment'],
            'tags'=> $validate['tags'],
            'user_id'=> $user,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $create->save();



        return redirect('newpost');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $posts = Post::all();
        return view('home', ['posts' => $posts] );
    }
    public function getOnePost($id){
        $post = Post::find($id);
        $user = Auth::user();
        $comments = Comment::where('post_id',$post->id)->get();

        return view('post.comment', ['post'=>$post, 'user'=>$user]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        //
        if(Auth::user()->id != $post->user_id){
            return redirect("post/edit/$post->id");
        }
        $validate = $request->validate([
            'title'=>'string|required',
            'comment'=>'string|required',
            'tags'=>'string|required'
        ]);
        $post->title = $validate['title'];
        $post->comment = $validate['comment'];
        $post->tags = $validate['tags'];

        $post->save();  
        return redirect("post/edit/$post->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        return redirect('home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        $users = User::all();
        return view('home', ['posts'=> $posts, 'users'=>$users]);
    }
    public function show($id)
    {
        //
        $posts = Post::all();
        return view('home', compact($posts));
    }
    public function search(Request $request){
        $search =  $request->search;
        $posts = Post::where('tags',$search)->get();
        //$posts = Post::where('title',$search)->get();
        $users = User::all();


        return view('home', compact(['posts', 'users']));


    }


}

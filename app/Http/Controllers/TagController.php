<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagController extends Controller
{
    //

    public function index(){

    }

    public function store($tag, $idpost){
        $tag = Tag::create([
            "tag"=>$tag,
            "idpost"=>$idpost
        ]);

        $tag->save();

    }
}

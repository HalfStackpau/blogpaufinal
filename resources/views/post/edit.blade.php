@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form class="form-class p-2" method="POST" action={{route('post.update',$post->id)}}>
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">{{ 'Title' }}</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value={{ $post->title }} placeholder={{ $post->title }}>
            </div>
            <div class="form-group" height="80px;">
                <label for="exampleInputPassword1">Comment</label>
                <input type="text" class="form-control" id="comment" name="comment" placeholder="text" value={{ $post->comment }} placeholder={{ $post->comment }}>
            </div>
            <div class="form-group" height="80px;">
                <label for="exampleInputPassword1">Tag</label>
                <input type="text" class="form-control" id="tags" name="tags" style="width:200px;" placeholder="text"  value={{ $post->tags }} placeholder={{ $post->tags }}>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>
@endsection

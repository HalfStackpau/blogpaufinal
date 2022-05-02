@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card">
            @foreach ($users as $user)
            @if($post->user_id == $user->id)         
                <div class="card-header">{{ $user->name }}</div>
                @endif
             @endforeach

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ $post->comment }}</p>
                    
                </div>
            </div>
            @if($post->user_id == $user->id)
                    <button type="button" class="btn btn-primary">
                    <a class="dropdown-item" href="{{ route('post.edit',$post->id) }}">
                    @method('PUT')
                    @csrf
                        {{ __('Edit') }}
                    </a> </button>
                        
                        <button class="btn btn-danger">
                        <a class="dropdown-item" href="{{ route('post.delete',$post->id) }}">
                            Delete
                        </a>
                        </button>
                    @endif
            <form class="form-class p-2" method="POST" action={{route('newcomment')}}>
                @method('POST')
                @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Comment</label>
                <input type="text" class="form-control" id="comment" name="comment" aria-describedby="emailHelp" placeholder="Write a comment">
                <input type="hidden" id="idpost" name="idpost" class={{$post->id}} value={{$post->id}} >
            </div>
            <button type="submit" class="btn btn-dark">Add Comment</button>

        </form>
        @foreach ($comments as $comment)
            @foreach ($users as $user)
                @if($comment->user_id == $user->id)         
                <div class="card-header">{{ $user->name }}</div>
                @endif
                @endforeach
                
            <div class="card">     
                

                <div class="card-body">

                    <p>{{ $comment->comments }}</p>
                    
                </div>
                @if($comment->user_id == $authuser)    
                <button class="btn btn-danger" style="width:200px">
                        <a class="dropdown-item" href="{{ route('comment.delete',$comment->id) }}">
                            Delete
                        </a>
                </button>
                @endif
            </div>
            
        @endforeach
            
        </div>
        
    </div>
</div>
@endsection

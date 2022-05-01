@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card">     
                <div class="card-header">{{ $user->name }}</div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ $post->comment }}</p>
                    
                </div>
            </div>
            <form class="form-class p-2" method="POST" action={{route('newcomment')}}>
                @method('POST')
        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Comment</label>
                <input type="text" class="form-control" id="comment" name="comment" aria-describedby="emailHelp" placeholder="Write a comment">
                <input type="text" id="idpost" name="idpost" value={{$post->id}} disabled style="visibility:hidden"/>
            </div>
            <button type="submit" class="btn btn-dark">Add Comment</button>
        </form>
            
        </div>
        
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @foreach ($posts ?? '' as $post)
        
            <div class="card">
            @foreach ($users ?? '' as $user)
                @if($post->user_id ==$user->id)         
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
                    @if($post->user_id == $user->id)
                    <button type="button" class="btn btn-secondary">Comment</button>
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
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

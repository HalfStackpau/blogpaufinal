@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form class="form-class p-2" id="formsearch" method="POST" action={{route('search')}}>
            @method('POST')
            @csrf
            <input type="text" class="form-control" id="search" name="search" aria-describedby="emailHelp" placeholder="Write a comment">

        </form>
        @foreach ($posts as $post)

            <div class="card">
            @foreach ($users  as $user)
                @if($post->user_id ==$user->id)         
                <div class="card-header">{{ $user->name }} - {{$post->title}}</div>
                @endif
            @endforeach
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ $post->comment }}</p>
                    <p>Tags:{{ $post->tags }}</p>
                    <button type="button" class="btn btn-secondary">
                    <a class="dropdown-item" href="{{ route('post',$post->id) }}">
                    Comment
                    </a >
                    </button>

                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection

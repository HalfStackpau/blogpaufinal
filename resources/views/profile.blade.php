@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form class="form-class p-2" id="formsearch" method="POST" action={{route('profile')}}>
            @method('POST')
            @csrf
            Email:
            <input  type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" value={{$user->email}} placeholder={{$user->email}}>
            User:
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value={{$user->name}} placeholder={{$user->name}}>
            <input type="hidden" class="form-control" id="iduser" name="iduser" aria-describedby="emailHelp" value={{$user->id}} placeholder={{$user->id}}>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
        

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

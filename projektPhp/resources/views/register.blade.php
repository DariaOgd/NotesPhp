@extends('layout')
@section('title', 'register')

@section('content')
<link href="{{asset('/css/register.css') }}" rel="stylesheet">

<div class="container">



    <form action="{{route('register.post')}}" method="POST">
        @csrf
        <div class="error">
                @if($errors ->any())
                <div class="err">
                        @foreach($errors -> all() as $error)
                        <div class="alert">{{$error}}</div>
                        @endforeach
                </div>
                @endif

                @if(session()-> has('error'))
                <div class="alert">{{session('error')}}</div>

                @endif

                @if(session()-> has('success'))
                <div class="alert-success">{{session('error')}}</div>

                @endif
        </div>
        <div class="name">
                <label for="Name"></label>
                <input type="name" class="form-control" placeholder="Imie:" name="name">
        </div>
        <div class="email">
                <label for="inputEmail"></label>
                <input type="email" class="form-control" placeholder="Email:" name="email">
        </div>
        <div class="password">
                <label for="inputPassword"></label>
                <input type="password" class="form-control" placeholder="Hasło" name="password">
        </div>


        <div class="btn">
                <button class="btn-register" type="submit">Stwórz konto</button>

         </div>

    </form>
    <img src="{{ asset('/css/login.svg') }}" alt="">



</div>


@endsection

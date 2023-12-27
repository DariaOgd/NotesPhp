@extends('layout')
@section('title', 'login')

@section('content')
<link href="{{asset('/css/login.css') }}" rel="stylesheet">

<div class="container">
    <div class="left">
    <img src="{{ asset('/css/login1.svg') }}" alt="">
    </div>
    <div class="right">
        <div class="top">
            <h2>Welcome back</h2>
            <p>Eneter your credentials</p>
        </div>
        <div class="log-in">

            <form action="{{route('login.post')}}" method="post">
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
                <div class="email">
                    <label for="inputEmail"></label>
                    <input type="email" class="form-control" placeholder="Email:" name="email">
                </div>
                <div class="password">
                    <label for="inputPassword"></label>
                    <input type="password" class="form-control" placeholder="Password:" name="password">
                </div>
                <div class="btn">
                    <button class="btn-log">Log in</button>
                    <a href="{{ route('register') }}" class="btn-register">Don't have an account? Click here</a>

                </div>

            </form>
        </div>
    </div>
</div>


@endsection

@extends('layout')
@section('title', 'new')

@section('content')

<link href="{{asset('/css/new.css') }}" rel="stylesheet">
<div class="container">
@include('sidebar')
    <div class="main">
    <form method="POST" action="{{ route('add-note') }}">
    @csrf 

    <div class="add">
        <button type="submit" class="add">Zapisz</button>
    </div>

    <label for="title">Tytuł:</label><br>
    <input type="text" id="title" name="title"><br><br>

    <label for="content">Treść:</label><br>
    <textarea id="content" name="content"></textarea><br><br>
</form>



    </div>
</div>


@endsection
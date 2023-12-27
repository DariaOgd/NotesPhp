@extends('layout')
@section('title', 'profile')

@section('content')

<link href="{{asset('/css/profile.css') }}" rel="stylesheet">
<script src="https://kit.fontawesome.com/20500f701e.js" crossorigin="anonymous"></script>


<div class="container">
@include('sidebar')

    <div class="main">
        <h2>Twoje notatki</h2>
        <div class="grid">
        @foreach($notes as $note)
                <a href="{{ route('note.show', $note->id) }}" class="test">
                    <h3>{{ $note->title }}</h3>
                </a>
            @endforeach

            
        </div>
    </div>


</div>

@endsection
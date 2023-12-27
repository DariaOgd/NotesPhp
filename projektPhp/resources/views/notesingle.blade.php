@extends('layout')

@section('title', $note->title)
<link href="{{asset('/css/notesingle.css') }}" rel="stylesheet">
<script src="https://kit.fontawesome.com/20500f701e.js" crossorigin="anonymous"></script>

@section('content')
    <div class="container">
    @include('sidebar')

        <div class="main">
            <div class="btn">
                <form method="POST" action="{{ route('note.destroy', $note->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="fas fa-trash" id="delete" onclick="return confirm('Are you sure?')"></button>
                </form>

            </div>


    <form method="POST" action="{{ route('note.update', $note->id) }}">
    @csrf
    @method('PUT')

    <label for="title">Tytuł:</label><br>
    <input type="text" id="title" name="title" value="{{ $note->title }}"><br><br>

    <label for="content">Treść:</label><br>
    <textarea id="content" name="content">{{ $note->content }}</textarea><br><br>

    <button type="submit" id="update">Aktualizuj</button>
    
</form>



        </div>
    </div>
@endsection

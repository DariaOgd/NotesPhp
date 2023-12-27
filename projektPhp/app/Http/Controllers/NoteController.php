<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Note; // Importujemy model Note

class NoteController extends Controller
{

    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            
        ]);

        // Utwórz nową notatkę na podstawie danych z żądania
        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;
        $note->user_id = Auth::id(); // Assign the current user's ID

        $note->save(); // Zapisz notatkę

        // Możesz także przekierować gdzieś lub zwrócić odpowiedź JSON
        return redirect()->route('profile');
    }

    public function showAllNotes()
    {
        $notes = Note::all();
        return view('profile', ['notes' => $notes]);
    }


    public function show($id)
    {
        $note = Note::findOrFail($id);
        return view('notesingle', ['note' => $note]); // Zmiana 'note.show' na 'notesingle'
    }
    

    public function destroy($id)
{
    $note = Note::findOrFail($id);
    $note->delete();
    return redirect()->route('profile')->with('success', 'Note deleted successfully');
}
    


public function update(Request $request, $id)
{
    $note = Note::findOrFail($id);

    // Validation, similar to store method
    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    // Update note
    $note->title = $request->title;
    $note->content = $request->content;
    $note->save();

    return redirect()->route('profile')->with('success', 'Note updated successfully');
}


public function getFromDatabase($id)
{
    return Cache::remember('cache_key_' . $id, 60, function () use ($id) {
        // Wykonaj operację pobrania danych z bazy
        return Note::find($id);
    });
}





//api use







    
}

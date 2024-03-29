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
    
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            
        ]);

        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;
        $note->user_id = Auth::id(); 

        $note->save(); 

       
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
        return view('notesingle', ['note' => $note]); 
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

   
    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

   
    $note->title = $request->title;
    $note->content = $request->content;
    $note->save();

    return redirect()->route('profile')->with('success', 'Note updated successfully');
}













    
}

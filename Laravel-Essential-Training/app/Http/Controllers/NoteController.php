<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    public function index()
    {
        // Logic to display the list of notes
        $user_id = Auth::id();
        $note = Note::where('user_id', $user_id)->latest('updated_at')->paginate(5);
        
        return view('notes.index')->with('notes', $note);
    }
   
    public function create()
    {
        // Logic to show the form for creating a new note
        return view('notes.create');
    }
    
    public function store(Request $request)
    {
        // Logic to store a new note
        $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        $note = new Note([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'user_id' => Auth::id(),
            'uuid' => Str::uuid()
        ]);
        $note->save();
        return redirect()->route('note.index')->with('success', 'Note created successfully.');
    }


    public function show(Note $note)
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
        }

        return view('notes.show', ['note' => $note]);
    }
    
    public function edit(Note $note)
    {
        // Logic to show the form for editing a specific note

        if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
        }

         return view('notes.edit', ['note' => $note]);
       
    }

    public function update(Request $request, Note $note)
    {

        if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
        }

         $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        $note -> update([
            'title' => $request->title,
            'text' => $request->text,
        ]);

        return redirect()->route('note.index')->with('success', 'Note updated successfully.');
    }

    public function destroy($id)
    {
        // Logic to delete a specific note
       
    }
}

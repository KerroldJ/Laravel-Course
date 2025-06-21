<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notebook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    public function index()
    {
        $note = Note::whereBelongsTo(Auth::user())->latest('updated_at')->paginate(5);
        return view('notes.index')->with('notes', $note);
    }
   
    public function create()
    {
        $user_id = Auth::id();
        $notebooks = Notebook::where('user_id', $user_id)->get();
        return view('notes.create')->with('notebooks', $notebooks);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        $note = Auth::user()->notes()->create([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'notebook_id' => $request->get('notebook_id'),
            'uuid' => Str::uuid(),
        ]);

        return redirect()->route('note.index')->with('success', 'Note created successfully.');
    }


    public function show(Note $note)
    {

        if ($note->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('notes.show', ['note' => $note]);
    }
    

    public function edit(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $user_id = Auth::id();
        $notebooks = Notebook::where('user_id', $user_id)->get();

        if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
        }

         return view('notes.edit', ['note' => $note, 'notebooks' => $notebooks]);
       
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
            'notebook_id' => $request->notebook_id,
        ]);

        return redirect()->route('note.show', $note)->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $note)
    {
       if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
       }
       
        $note->delete();
        return redirect()->route('note.index')->with('success', 'Note deleted successfully.');
    }
}

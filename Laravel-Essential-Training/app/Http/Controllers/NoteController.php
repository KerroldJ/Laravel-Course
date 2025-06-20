<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        // Logic to display the list of notes
        $user_id = Auth::id();
        $notes = Note::where('user_id', $user_id)->latest('updated_at')->get();
        
        return view('notes.index')->with('notes', $notes);
    }
   
    public function create()
    {
        // Logic to show the form for creating a new note
    }
    
    public function store(Request $request)
    {
        // Logic to store a new note

    }
    public function show($id)
    {
        // Logic to display a specific note
       
    }
    
    public function edit($id)
    {
        // Logic to show the form for editing a specific note
       
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific note
        
    }

    public function destroy($id)
    {
        // Logic to delete a specific note
       
    }
}

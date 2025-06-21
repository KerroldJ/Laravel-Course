<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notebook;
use Illuminate\Support\Facades\Auth;

class NotebookController extends Controller
{
    public function index()
    {
        // Logic to display the list of notes
        $user_id = Auth::id();
        $notebook = Notebook::where('user_id', $user_id)->latest('updated_at')->paginate(10);
        
        return view('notebook.index')->with('notebook', $notebook);
    }
   
    public function create()
    {
        // Logic to show the form for creating a new note
        return view('notebook.create');
    }
    
    public function store(Request $request)
    {
        // Logic to store a new notebook
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $notebook = new Notebook([
            'name' => $request->get('name'),
            'user_id' => Auth::id(),
        ]);
        $notebook->save();
        return redirect()->route('notebook.index')->with('success', 'Notebook created successfully.');
    }
    
    public function show(Notebook $notebook)
    {
        // // Logic to display a specific note
        // if (!Auth::check()) {
        //     abort(403, 'Unauthorized action.');
        // }

        // return view('notebook.show')->with('notebook', $notebook);
       
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

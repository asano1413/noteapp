<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PersonalNote;

use App\Http\Controllers\Controller;

class PersonalNoteController extends Controller
{
    public function create()
    {
        return view('create-personal-note');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $personalNote = new PersonalNote();
        $personalNote->title = $request->title;
        $personalNote->content = $request->content;
        $personalNote->user_id = auth()->id();
        $personalNote->save();

        return redirect()->route('personal-note.create')->with('success', 'Personal note created successfully.');
    }
}

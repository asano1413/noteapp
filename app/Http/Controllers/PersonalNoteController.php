<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PersonalNote;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalNoteController extends Controller
{

  use HasFactory;
  protected $fillable = [
    'title',
    'content',
    'user_id'
  ];

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

        PersonalNote::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        $personalNote = new PersonalNote();

        return redirect()->route('mypage')->with('success', 'Personal note created successfully.');
    }
    public function edit(PersonalNote $personalNote)
    {
        if ($personalNote->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('edit-personal-note', compact('personalNote'));
    }

    public function update(Request $request, PersonalNote $personalNote)
    {
        if ($personalNote->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $personalNote->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('mypage')->with('success', '更新が完了しました。');
    }

    public function destroy(PersonalNote $personalNote)
    {
        if ($personalNote->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $personalNote->delete();

        return redirect()->route('mypage')->with('success', '削除が完了しました。');
    }
}

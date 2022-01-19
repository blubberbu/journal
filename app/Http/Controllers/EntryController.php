<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EntryController extends Controller
{
    public function viewEntry($id) {
        $entry = Entry::find($id);

        return view('entry', compact('entry'));
    }

    public function search(Request $request)
    {
        $user = User::find(Session::get('userID'));
        $entries = Entry::where('title', 'like', '%' . $request->search . '%')->get();

        return view('home', compact('user', 'entries'));
    }

    public function addEntryPage()
    {
        return view('add-entry');
    }

    public function addEntry(Request $request)
    {
        $rules = [
            'title' => 'required',
            'image' => 'required|image',
            'body' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'insert');
        }

        $entry = new Entry();

        $user = User::find(Session::get('userID'));

        $entry->title = $request->title;
        $entry->user_id = $user->id;

        $entry->body = $request->body;

        $file = $request->file('image');
        $fileName = time() . '-' . $file->getClientOriginalName();

        Storage::putFileAs('public/images', $file, $fileName);

        $entry->image = 'images/' . $fileName;

        $entry->save();

        return redirect('/');
    }

    public function deleteEntry($id)
    {
        $entry = Entry::find($id);

        if (isset($entry)) {
            Storage::delete('public/' . $entry->image);
            
            $entry->delete();
        }

        return redirect('/');
    }
}

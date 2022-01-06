<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EntryController extends Controller
{
    public function showEntries()
    {
        $user = User::find(Session::get('userID'));
        $entry = User::find($user->id);
        $entries = Entry::find($entry);

        return view('entries', compact('user', 'entry', 'entries'));
    }

    public function newEntryPage()
    {
        return view('entry');
    }

    public function newEntry(Request $request)
    {
        $rules = [
            'title' => 'required',
            'image' => 'image'
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

        if (isset($request->image)) {
        $file = $request->file('image');
        $fileName = time() . '-' . $file->getClientOriginalName();

        Storage::putFileAs('public/images', $file, $fileName);

        $entry->image = 'images/' . $fileName;
        }

        $entry->save();

        return redirect('/entries');
    }
}

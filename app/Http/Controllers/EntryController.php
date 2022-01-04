<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class EntryController extends Controller
{
    public function showEntries()
    {
        $user = User::find(Session::get('userID'));
        $entry = User::find($user->id);
        $entries = Entry::all();

        return view('entries', compact('user', 'entry', 'entries'));

    }
}

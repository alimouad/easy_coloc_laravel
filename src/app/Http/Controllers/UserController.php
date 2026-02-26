<?php

namespace App\Http\Controllers;

use App\Models\Flatshare;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function home()
    {
        $invitation = auth()->user()->flatshare_id ? Flatshare::find(auth()->user()->flatshare_id)->invitations()->where('email', auth()->user()->email)->first() : null;
        $flatshares = Flatshare::where('id', auth()->user()->flatshare_id)->get();

        return view('pages.user.home', compact('flatshares'));
    }
}

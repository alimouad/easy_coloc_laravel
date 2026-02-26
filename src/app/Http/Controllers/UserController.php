<?php

namespace App\Http\Controllers;

use App\Models\Flatshare;
use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Models\User;

class UserController extends Controller
{
    //
    public function home()
    {
    
    $myFlatshare = Flatshare::where('id', auth()->user()->flatshare_id)->first();
        // Fetch pending invites for the logged-in user's email
        $pendingInvites = Invitation::with('flatshare.owner')
            ->where('email', auth()->user()->email)
            ->get();

        return view('pages.user.home', compact('myFlatshare', 'pendingInvites'));
    }
}

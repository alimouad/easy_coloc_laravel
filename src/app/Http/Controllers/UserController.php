<?php

namespace App\Http\Controllers;

use App\Models\Flatshare;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function home()
    {
        $flatshares = Flatshare::latest()->get();

        return view('pages.user.home', compact('flatshares'));
    }
}

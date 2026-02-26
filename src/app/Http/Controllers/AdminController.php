<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Flatshare;
use App\Models\Invitation;

class AdminController extends Controller
{
    //
    public function home()
    {

        $usersCount = User::count();
        $flatsharesCount = Flatshare::count();
        $invitationsCount = Invitation::count();

        $users = User::with('flatshare')->latest()->paginate(10);

        // Fetch all ecosystems
        $flatshares = Flatshare::withCount('users')->latest()->get();

        return view('pages.admin.home', compact(
            'usersCount',
            'users',
            'flatshares',
            'flatsharesCount',
            'invitationsCount'
        ));
    }
    public function ban(User $user)
    {
        $user->update(['is_banned' => true]);
        return back()->with('status', "NODE_{$user->id}_TERMINATED");
    }

    public function unban(User $user)
    {
        $user->update(['is_banned' => false]);
        return back()->with('status', "NODE_{$user->id}_RESTORED");
    }
}

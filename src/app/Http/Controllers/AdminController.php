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
    // Global Metrics (Immune to limits)
    $usersCount = User::count();
    $flatsharesCount = Flatshare::count();
    $invitationsCount = Invitation::count();


    $users = User::with('flatshare')
        ->latest()
        ->limit(3)
        ->get();

    
    $flatshares = Flatshare::withCount('users')
        ->latest()
        ->limit(3)
        ->get();

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

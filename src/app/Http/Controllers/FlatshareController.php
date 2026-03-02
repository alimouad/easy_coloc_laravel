<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flatshare;
use Illuminate\Support\Str;
use App\Models\Category;


class FlatshareController extends Controller
{

    public function index()
    {
        $flatshares = Flatshare::withCount('users')->latest()->get();
        return view('pages.admin.flatshares.flatshares_index', compact('flatshares'));
    }

    public function available()
    {
        $flatshares = Flatshare::with(['users', 'owner'])
            ->withCount('users')
            ->when(auth()->user()->flatshare_id, function ($query) {
                $query->where('id', '!=', auth()->user()->flatshare_id);
            })
            ->where('status', 'ACTIVE')
            ->latest()
            ->get();

        return view('pages.user.flatshare.available_flatshares', compact('flatshares'));
    }

    public function show($id)
    {
        $categories = Category::all();

        $flatshare = Flatshare::with(['users', 'owner'])->findOrFail($id);

        return view('pages.user.flatshare.flatshare_show', compact('flatshare', 'categories'));
    }
    public function showAdmin($id)
    {

        $flatshare = Flatshare::with(['users', 'owner'])->findOrFail($id);

        return view('pages.admin.flatshares.flatshare_show', compact('flatshare'));
    }



    public function store(Request $request)
    {
        if (auth()->user()->is_banned) {
            return back()->withErrors(['db' => 'Your account has been suspended. You cannot perform this action.']);
        }

        if (auth()->user()->flatshare_id) {
            return back()->withErrors(['db' => 'You are already a member of a colocation. Terminate current session first.']);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:flatshares,name',
        ]);
        $flatshare = Flatshare::create([
            'owner_id' => auth()->id(),
            'name' => $request->name,
            'invite_token' => 'EC-' . strtoupper(Str::random(8)),
        ]);

        // Link the owner immediately
        auth()->user()->update(['flatshare_id' => $flatshare->id, 'colocation_role' => 'OWNER']);

        return redirect()->route('user.home')->with('success', 'Ecosystem Protocol Initialized.');
    }

    public function cancel(Flatshare $flatshare)
    {
        if (auth()->user()->is_banned) {
            return back()->withErrors([
                'db' => 'Your account has been suspended.'
            ]);
        }

        if (auth()->id() !== $flatshare->owner_id) {
            return back()->withErrors([
                'db' => 'Only the owner can cancel this ecosystem.'
            ]);
        }

        $flatshare->update(['status' => 'CANCELLED']);

        $flatshare->users()->update([
            'flatshare_id' => null,
            'colocation_role' => null
        ]);

        return redirect()
            ->route('user.home')
            ->with('success', 'Ecosystem successfully terminated.');
    }


    public function leave(Flatshare $flatshare)
    {
        $user = auth()->user();

        if ($user->is_banned) {
            return back()->withErrors([
                'db' => 'Your account has been suspended.'
            ]);
        }

        if ($user->id === $flatshare->owner_id) {
            return back()->withErrors([
                'db' => 'Owner cannot leave. Use terminate instead.'
            ]);
        }

        $netBalance = $user->net_balance;

        if ($netBalance < 0) {
            return back()->withErrors([
                'db' => 'You cannot leave with negative balance. Please settle your debts first.'
            ]);
        }

        // Remove user from flatshare
        $user->update([
            'flatshare_id' => null,
            'colocation_role' => null
        ]);

        return redirect()
            ->route('user.home')
            ->with('success', 'Successfully left the ecosystem.');
    }
}

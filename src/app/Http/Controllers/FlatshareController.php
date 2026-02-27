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
}

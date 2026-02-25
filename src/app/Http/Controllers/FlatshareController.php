<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flatshare;
use Illuminate\Support\Str;

class FlatshareController extends Controller
{
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:flatshares,name',
        ]);

        $validatedData['invite_token'] = 'EC-' . strtoupper(Str::random(8));

        $flatshare = Flatshare::create($validatedData);

        return redirect()
            ->route('user.home')
            ->with('success', 'Ecosystem initialized with Token: ' . $flatshare->invite_token);
    }
}

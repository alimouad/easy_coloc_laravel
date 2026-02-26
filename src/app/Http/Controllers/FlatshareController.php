<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flatshare;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteResidentMail;
use App\Models\Invitation;

class FlatshareController extends Controller
{

    public function show($id)
    {
        $flatshare = Flatshare::with('users')->findOrFail($id);

        return view('pages.user.flatshare.flatshare_show', compact('flatshare'));
    }

    public function invite(Request $request, $id)
    {
        $flatshare = Flatshare::findOrFail($id);

        // 1. Validate the email
        $request->validate([
            'email' => 'required|email',
        ]);

        try {
            $invitation = Invitation::create([
                'flatshare_id' => $flatshare->id,
                'email' => $request->email,
                'token' => Str::random(32),
            ]);
            

            return back()->with('success', "Invitation sent to {$request->email}");
        } catch (\Exception $e) {
            return back()->withErrors(['db' => 'Mail server connection failed. Check your SMTP settings.']);
        }
    }

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

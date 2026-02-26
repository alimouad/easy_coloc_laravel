<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flatshare;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteResidentMail;
use App\Models\Invitation;
use App\Models\User;

class FlatshareController extends Controller
{

    public function show($id)
    {

        $flatshare = Flatshare::with(['users', 'owner'])->findOrFail($id);

        return view('pages.user.flatshare.flatshare_show', compact('flatshare'));
    }

    public function invite(Request $request, $id)
    {
        $flatshare = Flatshare::findOrFail($id);

        $request->validate([
            'email' => [
                'required',
                'email',
                'exists:users,email', // Ensures the user actually has a DarColoc account
            ],
        ]);

        $targetUser = User::where('email', $request->email)->first();

        if ($targetUser->flatshare_id) {
            return back()->withErrors(['email' => 'This resident is already assigned to a different ecosystem.']);
        }

        try {
            $invitation = Invitation::create([
                'flatshare_id' => $flatshare->id,
                'inviter_id' => auth()->id(),
                'email' => $request->email,
                'token' => $flatshare->invite_token,
            ]);

            // Trigger your Mail logic here
            // Mail::to($request->email)->send(new InviteResidentMail($flatshare));

            return back()->with('success', "Invitation sent to {$request->email}");
        } catch (\Exception $e) {
            return back()->withErrors(['db' => 'System error during invitation dispatch.']);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:flatshares,name',
        ]);

        $flatshare = Flatshare::create([
            'name' => $validatedData['name'],
            'invite_token' => 'EC-' . strtoupper(Str::random(8)),
            'owner_id' => auth()->id(),
        ]);
        $user = auth()->user();
        $user->flatshare_id = $flatshare->id;
        $user->colocation_role = 'OWNER';
        $user->save();

        return redirect()
            ->route('user.home')
            ->with('success', 'Ecosystem initialized with Token: ' . $flatshare->invite_token);
    }
}

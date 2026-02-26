<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flatshare;
use Illuminate\Support\Str;
use App\Models\Invitation;
use App\Models\User;

class InvitationController extends Controller
{
    //
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

    public function acceptInvite($id)
    {
        $invite = Invitation::findOrFail($id);

        // Update the User node
        $user = auth()->user();
        $user->update([
            'flatshare_id' => $invite->flatshare_id,
            'colocation_role' => 'MEMBER'
        ]);

        
        $invite->delete();

        return redirect()->route('user.home')->with('success', 'Node successfully integrated into ecosystem.');
    }

    public function declineInvite($id)
    {
        $invite = Invitation::findOrFail($id);
        $invite->delete();

        return redirect()->route('user.home')->with('success', 'Invitation protocol terminated.');
    }
}

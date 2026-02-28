<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Flatshare;

class ExpenseController extends Controller
{
    //
    public function show($id)
    {
        $categories = Category::all();
        $flatshare = Flatshare::with(['users', 'expenses.category', 'expenses.payer', 'expenses.participant'])->findOrFail($id);

        // Calculate balances per user
        $userBalances = $flatshare->users->map(function ($user) use ($flatshare) {
            // Credits: What others owe this user (where user is payer but NOT the debtor)
            $credits = $flatshare->expenses->where('payer_id', $user->id)->where('user_id', '!=', $user->id)->sum('amount');

            // Debts: What this user owes others (where user is debtor but NOT the payer)
            $debts = $flatshare->expenses->where('user_id', $user->id)->where('payer_id', '!=', $user->id)->sum('amount');

            return (object)[
                'identity' => $user,
                'net' => $credits - $debts,
                'credits' => $credits,
                'debts' => $debts
            ];
        });
        return view('pages.user.expense.expense_view', compact('flatshare', 'userBalances', 'categories'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'amount'       => 'required|numeric|min:0.01',
            'category_id'  => 'required|exists:categories,id',
            'flatshare_id' => 'required|exists:flatshares,id',
            'payer_id'     => 'required|exists:users,id',
            'participants' => 'required|array|min:1',
        ]);

        DB::transaction(function () use ($validated) {
            $share = round($validated['amount'] / count($validated['participants']), 2);

            foreach ($validated['participants'] as $userId) {
                Expense::create([
                    'flatshare_id' => $validated['flatshare_id'],
                    'category_id'  => $validated['category_id'],
                    'payer_id'     => $validated['payer_id'],
                    'user_id'      => $userId, // This identifies who owns this slice of the debt
                    'title'        => $validated['title'],
                    'amount'       => $share,
                ]);
            }
        });

        return back()->with('status', 'EXPENSE_NODES_SYNCED');
    }
}

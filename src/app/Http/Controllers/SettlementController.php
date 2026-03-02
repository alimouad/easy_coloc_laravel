<?php
namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Settlement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettlementController extends Controller
{
 
    public function settle(Expense $expense)
    {
        if (auth()->id() !== $expense->payer_id) {
            return back()->withErrors(['error' => 'UNAUTHORIZED_ACCESS: Only the creditor can verify settlement.']);
        }

        try {
            DB::transaction(function () use ($expense) {
                // Create settlement record
                Settlement::create([
                    'debtor_id'   => $expense->user_id,
                    'creditor_id' => $expense->payer_id,
                    'amount'      => $expense->amount,
                    'is_paid'     => true, 
                ]);
                $debtor = $expense->debtor;
                $debtor->increment('reputation_score');
                
                $expense->delete();
            });

            return back()->with('status', 'NODE_DEBT_SETTLED_SUCCESSFULLY');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'SETTLEMENT_FAILURE: ' . $e->getMessage()]);
        }
    }
}

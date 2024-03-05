<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debt;
use App\Models\ExtraPayment;
use App\Models\MonthlyPayment;
use Auth;
use Carbon\Carbon;

class DebtController extends Controller{
    private function calculateEndPeriod($current_balance, $interest_rate, $minimum_payment) {
        $monthly_interest_rate = $interest_rate / 12 / 100;
        $end_period = log($minimum_payment / ($minimum_payment - $current_balance * $monthly_interest_rate)) / log(1 + $monthly_interest_rate);
        return ceil($end_period);
    }

    public function store(Request $request){
    $debt = new Debt;
    $debt->user_id = Auth::id();
    $debt->category = $request->debt['category']['name'] == 'other-category' ? $request->debt['other-category']['name'] : $request->debt['category']['name'];
    $debt->debt_name = $request->debt['debt_name']['name'];
    $debt->current_balance = $request->debt['current_balance']['value'];
    $debt->interest_rate = $request->debt['interest_rate']['value'];
    $debt->minimum_payment = $request->debt['minimum_payment']['value'];
    $start_period = Carbon::parse($request->debt['start_period']['date']);
    $debt->start_period = $start_period;
    $debt->payment_strategy = $request->debt['payment_strategy']['strategy'];
    $end_period_months = $this->calculateEndPeriod($request->debt['current_balance']['value'], $request->debt['interest_rate']['value'], $request->debt['minimum_payment']['value']);
    $debt->end_period = $start_period->copy()->addMonths($end_period_months);
    $debt->save();

    return redirect()->back();
    
}

public function showDebtFreeCountdown() {
    $debts = Debt::where('user_id', auth()->id())->get();

    $end_period = null;
    $remaining_time = null;

    if (!$debts->isEmpty()) {
        $end_periods = $debts->map(function ($debt) {
            return Carbon::parse($debt->end_period);
        });

        $end_period = $end_periods->max();
        $remaining_time = Carbon::now()->diffInMonths($end_period);
    }

    //progress circle
    $monthlyPayments = MonthlyPayment::where('user_id', Auth::id())->get();
    $extraPayments = ExtraPayment::where('user_id', Auth::id())->get();

    $totalDebt = $debts->sum('current_balance');
    $principalPaid = $monthlyPayments->sum('amount') + $extraPayments->sum('amount');
    $remainingBalance = $totalDebt - $principalPaid;

    return view('user_debtcalc', [
        'end_period' => $end_period,
        'remaining_time' => $remaining_time,
        'totalDebt' => $totalDebt,
        'principalPaid' => $principalPaid,
        'remainingBalance' => $remainingBalance,
    ]);
}

public function storeExtraPayment(Request $request){
    $request->validate([
        'amount' => 'required|numeric|min:0',
    ]);

    // Create a new extra payment record
    $extraPayment = new ExtraPayment;
    $extraPayment->user_id = Auth::id();
    $extraPayment->amount = $request->amount;
    $extraPayment->save();

    // Redirect back with a success message
    return back()->with('success', 'Extra payment stored successfully.');
}

public function storeMonthlyPayment($debtId, $amount) {
    $debt = Debt::find($debtId);

    $monthlyPayment = new MonthlyPayment;
    $monthlyPayment->debt_name = $debt->debt_name;
    $monthlyPayment->amount = $amount;
    $monthlyPayment->payment_date = now();
    $monthlyPayment->save();
}

public function getDebtProgress() {
    $debts = Debt::where('user_id', Auth::id())->get();
    

    return view('user_debtcalc', [
        'totalDebt' => $totalDebt,
        'principalPaid' => $principalPaid,
        'remainingBalance' => $remainingBalance,
    ]);
}
   
}
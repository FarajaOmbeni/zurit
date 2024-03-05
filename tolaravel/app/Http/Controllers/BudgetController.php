<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetPlanner;
use App\Models\Income;
use App\Models\Expense;
use Auth;
use Carbon\Carbon;

class BudgetController extends Controller
{
    
    public function storeIncome(Request $request)
{
    $incomeData = $request->input('income');

    foreach ($incomeData as $category => $data) {
        if (!empty($data['expected_income']) && !empty($data['actual_income'])) {
            // Process only if both expected_income and actual_income are filled
            $validatedData = [
                'income_type' => $category,
                'expected_income' => $data['expected_income'],
                'actual_income' => $data['actual_income'],
                'user_id' => Auth::id(),
                'year_month' => now()->format('Y-m'),
            ];

            Income::create($validatedData);
        }
    }

    return redirect()->back()->with('success', 'Income data saved successfully');
}



    

public function storeExpense(Request $request)
{
    $expenseData = $request->input('expense');

    foreach ($expenseData as $category => $data) {
        if (!empty($data['expected_expense']) && !empty($data['actual_expense'])) {
            // Process only if both expected_expense and actual_expense are filled
            $validatedData = [
                'expense_type' => $category,
                'expected_expense' => $data['expected_expense'],
                'actual_expense' => $data['actual_expense'],
                'user_id' => auth()->id(),
                'year_month' => now()->format('Y-m'),
            ];

            Expense::create($validatedData);
        }
    }

    return redirect()->back()->with('success', 'Expense data saved successfully');
}


public function showBudgetData(){
    // Get current month and year using Carbon
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;

    // Check if there is data for the current month
    $hasDataForCurrentMonth = isset($monthlyIncomes[$currentMonth]) && isset($monthlyExpenses[$currentMonth]);

    // Fetch all incomes for the currently logged-in user
    $income = Income::where('user_id', auth()->id())->get();

    // Fetch all expenses for the currently logged-in user
    $expenses = Expense::where('user_id', auth()->id())->get();

    // Combine the incomes and expenses into the budget data
    $budget = $income->concat($expenses);

    // Calculate net income
    $actualIncome = Income::where('user_id', auth()->id())->sum('actual_income');
    $actualExpenses = Expense::where('user_id', auth()->id())->sum('actual_expense');
    $netIncome = $actualIncome - $actualExpenses;

    // Calculate monthly incomes and expenses
    $monthlyIncomes = Income::where('user_id', auth()->id())
        ->selectRaw('SUM(actual_income) as total, MONTH(created_at) as month')
        ->groupBy('month')
        ->pluck('total', 'month')
        ->all();

    $monthlyExpenses = Expense::where('user_id', auth()->id())
        ->selectRaw('SUM(actual_expense) as total, MONTH(created_at) as month')
        ->groupBy('month')
        ->pluck('total', 'month')
        ->all();

    // Get current month
    $currentMonth = date('m');

    // Check if there is data for the current month
    $hasDataForCurrentMonth = isset($monthlyIncomes[$currentMonth]) && isset($monthlyExpenses[$currentMonth]);

    // Pass the data to the view
    return view('user_budgetplanner', [
        'budget' => $budget, 
        'income' => $income, 
        'expenses' => $expenses, 
        'actualIncome' => $actualIncome, 
        'actualExpenses' => $actualExpenses, 
        'netIncome' => $netIncome,
        'monthlyIncomes' => $monthlyIncomes,
        'monthlyExpenses' => $monthlyExpenses,
        'hasDataForCurrentMonth' => $hasDataForCurrentMonth,
        'hasDataForCurrentMonth' => $hasDataForCurrentMonth,
        'currentMonth' => $currentMonth,
        'currentYear' => $currentYear
    ]);
}
}


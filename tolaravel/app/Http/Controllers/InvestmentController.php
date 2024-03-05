<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvestmentPlanner;
use App\Models\WithholdingTax;
use Illuminate\Support\Facades\Log;

class InvestmentController extends Controller
{
    public function storemonthlyInvestment(Request $request)
    {
        $investmentData = $request->input('investment');

        // Process only if all fields are filled
        if (!empty($investmentData['initialInvestment']) && !empty($investmentData['AdditionalInvestment']) && !empty($investmentData['numberOfMonths']) && !empty($investmentData['projectedRateOfReturn']) && !empty($investmentData['investment_type'])) {
            $validatedData = [
                'user_id' => auth()->id(),
                'initial_investment' => $investmentData['initialInvestment'],
                'withholding_tax_id' => $investmentData['investment_type'],
                'additional_investment' => $investmentData['AdditionalInvestment'],
                'calc_duration' => $request->calc_duration,
                'number_of_months' => $investmentData['numberOfMonths'],
                'projected_rate_of_return' => $investmentData['projectedRateOfReturn'],
                'year_month' => now()->format('Y-m'),
            ];

            InvestmentPlanner::create($validatedData);
        }

        return redirect()->back()->with('success', 'Investment plan has been created successfully.');
    }

    public function showinvestmentData()
    {
    $investments = InvestmentPlanner::where('user_id', auth()->id())->get();
    $withholdingTaxRates = WithholdingTax::all();

    $monthlyInvestments = [];

    foreach ($investments as $investment) {
        $numberOfMonths = $investment->number_of_months;
        $initialInvestment = $investment->initial_investment;
        $additionalDeposits = $investment->additional_investment;
        $projectedRateOfReturn = $investment->projected_rate_of_return / 100; // Divide by 100
        $withholdingTaxRate = WithholdingTax::find($investment->withholding_tax_id)->tax_rate / 100; // Divide by 100

        // Get the current month and year
        $currentMonth = date('n');
        $currentYear = date('Y');

        // Set initial values
        $cumulativeInvestmentValue = $initialInvestment;
        $monthlyInvestments[$investment->id][$currentMonth] = [
            'initial_investment' => $initialInvestment,
            'additional_deposits' => $additionalDeposits,
            'gross_interest' => 0,
            'withholding_tax' => 0,
            'net_interest' => 0,
            'cumulative_investment_value' => $cumulativeInvestmentValue,
        ];

        for ($i = 1; $i <= $numberOfMonths; $i++) {
            // Calculate for each month
            $grossInterest = 0;
            $withholdingTax = 0;
            $netInterest = 0;
            if ($i > 1) { // Skip the first month
                $grossInterest = round($cumulativeInvestmentValue * ($projectedRateOfReturn / 12), 2);
                $withholdingTax = round($grossInterest * $withholdingTaxRate, 2);
                $netInterest = round($grossInterest - $withholdingTax, 2);
            }
            $cumulativeInvestmentValue = round($cumulativeInvestmentValue + $additionalDeposits + $netInterest, 2);
            
            $monthlyInvestments[$investment->id][$currentMonth] = [
                'initial_investment' => round($initialInvestment, 2),
                'additional_deposits' => round($additionalDeposits, 2),
                'gross_interest' => $grossInterest,
                'withholding_tax' => $withholdingTax,
                'net_interest' => $netInterest,
                'cumulative_investment_value' => $cumulativeInvestmentValue,
            ];
        
            $currentMonth++;
        
            // Adjust year when reaching December
            if ($currentMonth > 12) {
                $currentMonth = 1;
                $currentYear++;
            }
        }
    }

    return view('user_investmentplanner', [
        'monthlyInvestments' => $monthlyInvestments,
        'withholdingTaxRates' => $withholdingTaxRates
    ]);
}
    
}

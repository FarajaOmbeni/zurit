<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvestmentPlanner;
use App\Models\WithholdingTax;
use Illuminate\Support\Facades\Log;
use App\Models\Asset;

class InvestmentController extends Controller
{
    public function storemonthlyInvestment(Request $request)
    {
        $investmentData = $request->input('investment');

        // Process only if all fields are filled
        if (!empty($investmentData['initialInvestment']) && !empty($investmentData['numberOfMonths']) && !empty($investmentData['projectedRateOfReturn']) && !empty($investmentData['investment_type'])) {
            $validatedData = [
                'user_id' => auth()->id(),
                'initial_investment' => $investmentData['initialInvestment'],
                'withholding_tax_id' => $investmentData['investment_type'],
                'calc_duration' => $request->calc_duration,
                'number_of_months' => $investmentData['numberOfMonths'],
                'projected_rate_of_return' => $investmentData['projectedRateOfReturn'],
                'year_month' => now()->format('Y-m'),
            ];

            InvestmentPlanner::create($validatedData);
        }

        return redirect()->route('user_investmentplanner')->with('success', [
            'message' => 'Investment Plan Created Successfully',
            'duration' => 3000,
        ]);
    }

    public function showinvestmentData(Request $request)
    {
    $investments = InvestmentPlanner::where('user_id', auth()->id())->get();
    $withholdingTaxRates = WithholdingTax::all();
    $defaultRate = $withholdingTaxRates->isEmpty() ? null : $withholdingTaxRates->first()->tax_rate;

    $monthlyInvestments = [];

    foreach ($investments as $investment) {
        $numberOfMonths = $investment->number_of_months;
        $initialInvestment = $investment->initial_investment;
        $projectedRateOfReturn = $investment->projected_rate_of_return / 100; // Divide by 100
        $withholdingTaxRate = WithholdingTax::find($investment->withholding_tax_id)->tax_rate / 100; // Divide by 100

        // Get the current month and year
        $currentMonth = date('n');
        $currentYear = date('Y');

        // Set initial values
        $cumulativeInvestmentValue = $initialInvestment;
        $monthlyInvestments[$investment->id][$currentMonth] = [
            'initial_investment' => $initialInvestment,
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
            $cumulativeInvestmentValue = round($cumulativeInvestmentValue + $netInterest, 2);
            
            $monthlyInvestments[$investment->id][$currentMonth] = [
                'initial_investment' => round($initialInvestment, 2),
                'gross_interest' => $grossInterest,
                'withholding_tax' => $withholdingTax,
                'net_interest' => $netInterest,
                'cumulative_investment_value' => $cumulativeInvestmentValue,
                'withholding_tax_id' => $investment->withholding_tax_id,
            ];
        
            $currentMonth++;
        
            // Adjust year when reaching December
            if ($currentMonth > 12) {
                $currentMonth = 1;
                $currentYear++;
            }
        }
    }



    // After the investment calculations

// After the investment calculations
foreach ($investments as $investment) {
    // Get the selected withholding tax
    $withholdingTax = WithholdingTax::find($investment->withholding_tax_id);

    if ($withholdingTax) {
        $withholdingTaxName = $withholdingTax->investment_type;
    } else {
        $withholdingTaxName = 'Investment';
    }

    // Get the last cumulative investment value
    $lastCumulativeInvestmentValue = end($monthlyInvestments[$investment->id])['cumulative_investment_value'];

    // Create a new asset
    Asset::updateOrCreate(
        ['user_id' => auth()->id(), 'asset_description' => $withholdingTaxName],
        ['asset_value' => $lastCumulativeInvestmentValue]
    );
}




    return view('user_investmentplanner', [
        'monthlyInvestments' => $monthlyInvestments,
        'withholdingTaxRates' => $withholdingTaxRates,
        'defaultRate' => $defaultRate,
    ]);
}

// public function destroy($id)
// {
//     $investment = InvestmentPlanner::find($id);

//     // Check if investment exists and if the user is authorized to delete it
//     if ($investment && $investment->user_id == auth()->id()) {
//         // Get the corresponding asset
//         $withholdingTax = WithholdingTax::find($investment->withholding_tax_id);
//         $withholdingTaxName = $withholdingTax ? $withholdingTax->investment_type : 'Investment';

//         $asset = Asset::where('user_id', auth()->id())
//             ->where('asset_description', $withholdingTaxName)
//             ->first();

//         // Delete the asset if its value matches the final cumulative investment value
//         if ($asset && $asset->asset_value == end($monthlyInvestments[$investment->id])['cumulative_investment_value']) {
//             $asset->delete();
//         }

//         $investment->delete();
//         return redirect()->route('user_investmentplanner')->with('success', [
//             'message' => 'Investment Deleted Successfully',
//             'duration' => 3000,
//         ]);
//     }

//     return redirect()->route('user_investmentplanner')->with('error', [
//         'message' => 'Error Deleting Investment ',
//         'duration' => 3000,
//     ]);
// }

public function destroy($id)
{
    $investment = InvestmentPlanner::find($id);

    // Check if investment exists and if the user is authorized to delete it
    if ($investment && $investment->user_id == auth()->id()) {
        $investment->delete();
        return redirect()->route('user_investmentplanner')->with('success', [
            'message' => 'Investment Deleted Successfully',
            'duration' => 3000,
        ]);
    }

    return redirect()->route('user_investmentplanner')->with('error', [
        'message' => 'Error Deleting Investment ',
        'duration' => 3000,
    ]);
}


}

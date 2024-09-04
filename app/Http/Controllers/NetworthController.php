<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Debt;
use App\Models\Asset;
use App\Models\Liability;
use Illuminate\Http\Request;

class NetworthController extends Controller
{
    //
    public function storeAsset(Request $request){
        $userId = Auth::id();
        // Validate the form data
        $validatedData = $request->validate([
            'assetDescription' => 'required',
            'assetValue' => 'required|numeric',
        ]);

        // Store the asset in the database
        $asset = Asset::create([
            'user_id' => $userId,
            'asset_description' => $validatedData['assetDescription'],
            'asset_value' => $validatedData['assetValue'],
        ]);

        // Redirect or perform any other action after storing
        return redirect('user_networthcalc')->with('success', [
            'message' => 'Assest Added Succesfully',
            'duration' => 3000,
        ]);
    }

    public function storeLiability(Request $request){
        $userId = Auth::id();
        // Validate the form data
        $validatedData = $request->validate([
            'liabilityDescription' => 'required',
            'liabilityValue' => 'required|numeric',
        ]);

        // Store the liability in the database
        $liability = Debt::create([
            'user_id' => $userId,
            'debt_name' => $validatedData['liabilityDescription'],
            'current_balance' => $validatedData['liabilityValue'],
        ]);

        return redirect('user_networthcalc')->with('success', [
            'message' => 'Liability Added Succesfully',
            'duration' => 3000,
        ]);
    }

    public function showNetWorth(){
        $assets = Asset::where('user_id', auth()->id())->get();
        $liabilities = Debt::where('user_id', auth()->id())->get();
        $liabilities2 = Liability::where('user_id', auth()->id())->get();
    
        return view('user_networthcalc', compact('assets', 'liabilities','liabilities2'));
    }  
}

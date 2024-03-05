<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Liability;
use Auth;

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
        return redirect()->back()->with('success', 'Asset data saved successfully');
    }

    public function storeLiability(Request $request){
        $userId = Auth::id();
        // Validate the form data
        $validatedData = $request->validate([
            'liabilityDescription' => 'required',
            'liabilityValue' => 'required|numeric',
        ]);

        // Store the liability in the database
        $liability = Liability::create([
            'user_id' => $userId,
            'liability_description' => $validatedData['liabilityDescription'],
            'liability_value' => $validatedData['liabilityValue'],
        ]);

        return redirect()->back()->with('success', 'Liability data saved successfully');
    }

    public function showNetWorth(){
        $assets = Asset::where('user_id', auth()->id())->get();
        $liabilities = Liability::where('user_id', auth()->id())->get();
    
        return view('user_networthcalc', compact('assets', 'liabilities'));
    }
    
    

    
}

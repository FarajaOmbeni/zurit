<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'training' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|numeric',
        ]);
    
        // Store the data in the database
        Training::create($request->all());
    
        // Return a response
        return response()->json([
            'message' => 'Enrollment successful!',
        ]);
    }
}

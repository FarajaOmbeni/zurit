<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\MarketingMessage;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MarketingMessage as MarketingMessageMail;

class MarketingMessageController extends Controller
{
    public function index()
    {
        $subscribedUsers = Subscription::all();
        $allUsers = User::all();

        return view('marketing_admindash', compact('subscribedUsers', 'allUsers'));
    }

public function sendMessage(Request $request)
{
    // Validate request
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'user_ids' => 'required|array',
        'user_ids.*' => 'exists:users,id',
    ]);

    // Save the message to the database for each user
    foreach ($request->input('user_ids') as $userId) {
        $marketingMessage = MarketingMessage::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $userId,
        ]);

        // Get the user's email address
        $userEmail = User::findOrFail($userId)->email;

        // Log information about the email sending process
        Log::info("Sending email to user ID $userId, Email: $userEmail");

        // Send email to the user
        try {
            //Mail::to($userEmail)->send(new MarketingMessageMail($marketingMessage));
            Mail::to($userEmail)->send(new MarketingMessageMail(
                $request->input('title'),
                $request->input('content'), 
            ));
            Log::info("Email sent successfully to user ID $userId, Email: $userEmail");
        } catch (\Exception $e) {
            Log::error("Error sending email to user ID $userId, Email: $userEmail. Error: " . $e->getMessage());
        }
    }

    return redirect()->route('marketing_admindash')->with('success', 'Messages sent successfully');
}
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Marketing_Contact;
use Illuminate\Support\Facades\Hash;

class MarketingController extends Controller
{
    public function index()
    {
        $contacts = Marketing_Contact::paginate(10);

        return view('upload_contacts', ['contacts' => $contacts]);
    }


    public function add_users_view()
    {
        return view('add_users_admindash');
    }

    public function add_users(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        try {
            $user = User::create($validatedData);
            return redirect()->back()->with('success', 'User added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['email' => 'The email address is already in use.'])->withInput();
        }
    }
}

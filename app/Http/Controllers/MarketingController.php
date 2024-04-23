<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marketing_Contact;

class MarketingController extends Controller
{
    public function index()
    {
        $contacts = Marketing_Contact::paginate(10);

        return view('upload_contacts', ['contacts' => $contacts]);
    }

    public function add_one_contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:marketing__contacts,email',
            'phone' => 'required',
        ]);

        Marketing_Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        return redirect('/marketing_contacts_admindash')->with('success', 'Contact added successfully');
    }
}

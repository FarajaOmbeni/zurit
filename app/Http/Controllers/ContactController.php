<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
       // Validate the request data
$validatedData = $request->validate([
    'name' => 'required',
    'email' => 'required|email',
    'userMessage' => 'required',
]);

// Create a new contact record in the database
$contact = Contact::create($validatedData);

// Send email only if the validation and database insertion are successful
Mail::to('otaodavis.od@gmail.com')->send(new ContactFormMail(
    $request->input('name'),
    $request->input('email'),
    $request->input('userMessage')
));

return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function showAdminDashboard()
    {
        $contacts = Contact::all();
        return view('contacts_admindash', compact('contacts'));
    }
}

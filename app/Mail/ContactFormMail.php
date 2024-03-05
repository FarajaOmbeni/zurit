<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $userMessage; // changed from $message

    public function __construct($name, $email, $userMessage) // changed from $message
    {
        $this->name = (string)$name;
        $this->email = (string)$email;
        $this->userMessage = (string)$userMessage; // changed from $message
    }

    public function build()
    {
        return $this->view('emails.contact-form')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'userMessage' => $this->userMessage, // changed from $message
            ])
            ->subject('New Contact Form Submission');
    }
}
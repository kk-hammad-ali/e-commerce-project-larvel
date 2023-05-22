<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function sendMessage(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        $body = "Name: $name\nEmail: $email\nMessage: $message";

        Mail::raw($body, function ($emailMessage) use ($name, $email) {
            $emailMessage->to('alaptop2022@gmail.com')
                        ->from($email)
                        ->subject('New Contact Message')
                        ->replyTo($email);
        });

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }

}

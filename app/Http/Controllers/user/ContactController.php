<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request){
        $validation = $request->validate(
            [
                'name' => 'required|min:1|max:255',
                'email' => 'required|min:1|max:255',
                'subject' => 'required|min:1|max:255',
                'phone' => 'required|min:1|max:255',
                'message' => 'required|min:1'
            ]
        );
        $contact = new Contact;
        if(Auth()->user()!=null){
            $contact->user_id = auth()->user()->id;
        }
        
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        if (Auth()->user()!=null) {
            $details = [
                'Name' => $request->name,
                'Email' => $request->email,
                'Phone' => $request->phone,
                'Subject' => $request->subject,
                'Message' => $request->message,
                'User_ID' => Auth()->user()->name
            ];

            Mail::to('rangmahal.info@gmail.com')->send(new ContactMail($details));
            return back()->with('success', 'Your Message Send, Admin Contact you soon!');
        } else {
            $details = [
                'Name' => $request->name,
                'Email' => $request->email,
                'Phone' => $request->phone,
                'Subject' => $request->subject,
                'Message' => $request->message,
                'User_ID' => 'Without login'
            ];

            Mail::to('rangmahal.info@gmail.com')->send(new ContactMail($details));
            return back()->with('success', 'Your Message Send, Admin Contact you soon!');
        }
    }
}

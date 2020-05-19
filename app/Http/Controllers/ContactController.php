<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;
use App\Mail\Contact;
class ContactController extends Controller
{
    public function index()
    {           
        return view('contact');
    }
    public function store()
    { 
        $validatedAtrributes = request()->validate([
            'email' => ['required','email']
        ]); 
               
        /* //text email
        Mail::raw("Some mail content!", function($message){
            $message->to(request('email'))
                    ->subject("sample subject");
        });*/
        
        /*Mail::to(request('email'))
            ->send(new ContactMe('some value from DB')); */

            Mail::to(request('email'))
            ->send(new Contact());

        return redirect('/contact')->with('message', 'Email sent successfully!');

    }
}

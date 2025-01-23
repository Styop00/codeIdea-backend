<?php

namespace App\Http\Controllers;

use App\Mail\ContactCompanyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $req){
        $name=$req->input("name");
        $phone=$req->input("phone");
        $email=$req->input("email");
        $message=$req->input("message");
        Mail::to("info@codeidea.com")->send(new ContactCompanyMail(
            $name,
            $email,
            $phone,
            $message
        ));
        return response()->json(['message' => 'Email sent successfully'], 200);

    }
}

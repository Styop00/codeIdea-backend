<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMailRequest;
use App\Mail\ContactCompanyMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactMailRequest $req):JsonResponse
    {
        $name=$req->input("name");
        $phone=$req->input("phone");
        $email=$req->input("email");
        $message=$req->input("message");
        $contactMail=config('mail.from.address');
        Mail::to($contactMail)->send(new ContactCompanyMail($name,$email,$phone,$message));
        return response()->json(['message' => 'Email sent successfully'], 200);


    }
}

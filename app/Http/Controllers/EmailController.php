<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use App\Jobs\SendUserEmailJob;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmailController extends Controller
{
    //
    public function sendEmail()
    {
        $users = User::limit(25)->get();

        // foreach ($users as $user) {
        //     }

        $user = User::create([
            'name' => "Ahmed Saeed",
            'email' => "paxeyi1666@anawebs.com",

            'password' => Hash::make("Ahmed Saeed"),
        ]);
        dispatch(new SendUserEmailJob($user));
        return response()->json(['success' => 'Email sent successfully.']);
    }
}

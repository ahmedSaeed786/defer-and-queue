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
            'email' => "vivici3873@anawebs.com",

            'password' => Hash::make("Ahmed Saeed"),
        ]);
        dispatch(new SendUserEmailJob($user));
        return response()->json(['success' => 'Email sent successfully.']);
    }
    public function add()
    {
        $users = User::limit(100)->get();

        foreach ($users as $user) {

            dispatch(new SendUserEmailJob($user));
        }
        return response()->json(['success' => 'Email sent successfully.']);
    }

    public function defer()
    {
        $users = User::limit(100)->get();

        foreach ($users as $user) {

            SendUserEmailJob::dispatch($user)->afterResponse();
        }

        return response()->json([
            'success' => 'Emails queued successfully.'
        ]);
    }
    public function store()
    {

        // $count = User::get();
        // return $count;
        $users = [
            [
                'name' => 'Ahmed Saeed',
                'email' => 'vivici3873@anawebs.com',
                'password' => Hash::make('Ahmed Saeed'),
            ],
            [
                'name' => 'Ahmed Saeed',
                'email' => 'ahmed1612f@gmail.com',
                'password' => Hash::make('Ahmed Saeed'),
            ],
            [
                'name' => 'Ahmed Saeed',
                'email' => 'ahmed1612d@gmail.com',
                'password' => Hash::make('Ahmed Saeed'),
            ],
            [
                'name' => 'Ahmed Saeed',
                'email' => 'boyasstar@gmail.com',
                'password' => Hash::make('Ahmed Saeed'),
            ],
            [
                'name' => 'Ahmed Saeed',
                'email' => 'ahmedsaeedprojects@gmail.com',
                'password' => Hash::make('Ahmed Saeed'),
            ],
            [
                'name' => 'Ahmed Saeed',
                'email' => 'ahmedsaeedshaikh01@gmail.com',
                'password' => Hash::make('Ahmed Saeed'),
            ],
        ];

        $details = User::insert($users);

        return response()->json([
            'success' =>  $details
        ]);
    }
}

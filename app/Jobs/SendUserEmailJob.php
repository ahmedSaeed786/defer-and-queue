<?php

namespace App\Jobs;

use App\Mail\SendEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendUserEmailJob implements ShouldQueue
{
    use Queueable;

    public $user;

    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = [
            'name' => $this->user->name,
            'message' => 'This is a test email from Laravel 12.'
        ];

        Mail::to($this->user->email)->send(new SendEmail($this->user));
    }
}

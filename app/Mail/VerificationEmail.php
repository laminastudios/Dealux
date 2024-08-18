<?php

// app/Mail/VerificationEmail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        Log::info("Created user with user_id: " . $this->user->user_id);
        Log::info("User name is: " . $this->user->username);
        return $this->view('emails.verify')
            ->with(['user' => $this->user, 
                    'verificationUrl' => route('verify', ['user_id' => $this->user->user_id]),]);
    }
}

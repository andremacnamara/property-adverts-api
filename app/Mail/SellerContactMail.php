<?php

namespace App\Mail;

use App\User;
// use App\Http\Requests\SellerContactRequest;

use Illuminate\Http\Request;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SellerContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $msg;

    public function __construct(User $user, $msg)
    {
        $this->user = $user;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('welcome');
    }
}

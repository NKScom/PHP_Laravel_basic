<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTemplateController extends Mailable
{
    use Queueable, SerializesModels;

    public $title, $mail_body; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $mail_body)
    {
        $this->title = $title;
        $this->mail_body = $mail_body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build($from, $subject)
    {
        return $this
                ->view('email.main');
    }
}

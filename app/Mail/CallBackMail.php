<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CallBackMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($request)
    {
        $this->data = $request->validated();
    }

    public function build()
    {
        $mail = $this->view('emails.callback')
            ->subject($this->data['subject'])
            ->with('data', $this->data);

        return $mail;
    }
}

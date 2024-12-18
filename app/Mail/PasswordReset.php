<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Customer;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;


    public $resetLink;
    /**
     * Create a new message instance.
     */
    public function __construct($resetLink)
    {
        $this->resetLink = $resetLink;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Đặt lại mật khẩu',
        );
    }


    public function build()
    {
        return $this->subject('Đặt lại mật khẩu')
                    ->view('emails.reset-password')
                    ->with([
                        'resetLink' => $this->resetLink,
                    ]);
    }
}
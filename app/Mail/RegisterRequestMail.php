<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;
    public $address;
    public $country;
    public $phone;
    public $email;
    public $tv;
    public $netflix;
    public $ytpremium;
    public $vpn;
    public $link;
    public function __construct($name,
    $address,
    $country,
    $phone,
    $email,
    $tv,
    $netflix,
    $ytpremium,
    $vpn,
    $link)
    {
        $this->name = $name;
        $this->address = $address;
        $this->country = $country;
        $this->phone = $phone;
        $this->email = $email;
        $this->tv = $tv;
        $this->netflix = $netflix;
        $this->ytpremium = $ytpremium;
        $this->vpn = $vpn;
        $this->link = $link;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Register Request',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.registerRequest',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

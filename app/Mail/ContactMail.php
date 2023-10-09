<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public string $name, public string $email, public string $body)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // $data = array('name'=>"Virat Gandhi");
        


        // dd(Mail::send(['text'=>'mail'], $data, function($message) {
        //     $message->to('gurban780@gmail.com', 'Tutorials Point')->subject
        //         ('Laravel Basic Testing Mail');
        //     $message->from('sanjar.evil@gmail.com','Virat Gandhi');
        // }));

        // dd(mail($to, $subject, $message, $headers));
        return new Envelope(
            subject: 'Contact Mail from resume.local',
            replyTo: [
                new Address('gurban780@gmail.com'),
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.contact',
            with: [
                'name' => $this->name,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

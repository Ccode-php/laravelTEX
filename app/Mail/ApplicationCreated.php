<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;

    public Application $application;
    
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Application Created',
        );
    }

    
    public function content(): Content
    {
        return new Content(
            view: 'emails.application-created',
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

    public function build(){
        return $this->from('example@example.com', 'Example')
                    ->view('emails.application-created')
                    ->subject('Application Created')
                    ->attachFromStorageDisk('public', $this->application->file_url);
    }
}

<?php

/* 5.- ENVIO-CORREO-V1-P1 */
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            /* from:new Address('sistemadesignstyle@gmail.com','sistemas'),
            subject: 'Test Contact', */


            from: new Address('atencion@kalmaperu.org', 'Atención Kalma'),
       subject: 'Atención Kalma Perú',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'contacto',
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

    /* public function build()
    {
        return $this->view('contacto')
                    ->with('nombre', $this->nombre);
    } */
}

/* /5.- ENVIO-CORREO-V1-P1 */

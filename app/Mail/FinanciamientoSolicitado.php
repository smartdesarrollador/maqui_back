<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FinanciamientoSolicitado extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $moto;
    public $financiamiento;

    /**
     * Create a new message instance.
     */
    public function __construct($cliente, $moto, $financiamiento)
    {
        $this->cliente = $cliente;
        $this->moto = $moto;
        $this->financiamiento = $financiamiento;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address', 'noreply@maquimotora.com'), 'Maquimotora'),
            subject: 'Solicitud de Financiamiento Recibida - Maquimotora',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.financiamiento-solicitado',
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
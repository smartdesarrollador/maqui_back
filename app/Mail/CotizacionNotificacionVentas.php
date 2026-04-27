<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CotizacionNotificacionVentas extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $moto;
    public $cotizacion;

    public function __construct($cliente, $moto, $cotizacion)
    {
        $this->cliente = $cliente;
        $this->moto = $moto;
        $this->cotizacion = $cotizacion;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address', 'ventas@maquimotora.com'), 'Maquimotora'),
            subject: 'Nueva Cotización #' . str_pad($this->cotizacion->id_cotizacion, 6, '0', STR_PAD_LEFT) . ' - ' . $this->cliente->nombre . ' ' . $this->cliente->apellido,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mails.cotizacion-notificacion-ventas',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

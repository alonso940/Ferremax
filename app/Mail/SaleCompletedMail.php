<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Sale;

class SaleCompletedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sale;
    protected $pdfData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Sale $sale, $pdfData)
    {
        $this->sale = $sale;
        $this->pdfData = $pdfData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tu Pedido #'.$this->sale->number.' ha sido procesado - FerreMax')
                    ->view('emails.sale_completed')
                    ->attachData($this->pdfData, 'comprobante_'.$this->sale->number.'.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}

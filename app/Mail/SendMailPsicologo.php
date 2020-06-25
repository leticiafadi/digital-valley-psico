<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailPsicologo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $atendimento;

    public function __construct($atendimento)
    {
        $this->atendimento = $atendimento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        // return $this->view('mail.novo-atendimento');
        return $this->markdown('mail.exemplo')->with([
            'user' => 'Guilherme N'
        ]);
    }
}

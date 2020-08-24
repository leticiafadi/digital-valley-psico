<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailAluno extends Mailable
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
        $horarios = [
            'a' => "08:00 as 09:00",
            'b' => "09:00 as 10:00",
            'c' => "10:00 as 11:00",
            'd' => "11:00 as 12:00",
            'e' => "13:00 as 14:00",
            'f' => "14:00 as 15:00",
            'g' => "15:00 as 16:00",
            'h' => "16:00 as 17:00",
            'i' => "17:00 as 18:00",
            'j' => "18:00 as 19:00",
        ];
        return $this->markdown('mail.atualizacao-atendimento')->with([
            'user' => $this->atendimento['nome_psicologo'],
            'aluno' => $this->atendimento['nome_aluno'],
            'dia' => date('d/m/y', strtotime($this->atendimento['dia'])),
            'hora' => $horarios[$this->atendimento['hora']],
        ]);
    }
}

@component('mail::message')
Olá **{{$user}}**,<br>
O aluno **{{$aluno}}** marcou um atendimento para o dia **{{$dia}}** de **{{$hora}}**.

@component('mail::button', ['url' => "link"])
Veja
@endcomponent
Obrigado,  
Fênix Psicologia.
@endcomponent
@component('mail::message')
Olá **{{$aluno}}**,<br>
O seu atendimento com o psicologo(a) **{{$user}}** foi alterado para o dia **{{$dia}}** de **{{$hora}}**.

@component('mail::button', ['url' => "link"])
Veja
@endcomponent
Obrigado,  
Fênix Psicologia.
@endcomponent
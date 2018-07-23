@component('mail::message')
# Amigo Secreto
Olá {{ $participant->name }}
Segue seu amigo secreto.


Obrigado,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')

Olá {{ $participant->name }}
Segue seu amigo secreto é: {{ $secret->name }}, idade: {{ $secret->age }}.<br>
Genero: {{ $secret->genre }}


Obrigado,<br>
{{ config('app.name') }}
@endcomponent

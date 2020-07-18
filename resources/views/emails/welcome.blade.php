@component('mail::message')
# Hola {{$user->name }}

ya esta registrado a la pagiana.

@component('mail::button', ['url' => ''])
ir a la pagina
@endcomponent

Gracias por usar la App,<br>
{{ config('app.name') }}
@endcomponent

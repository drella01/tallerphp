@component('mail::message')
# Introduction

The body of your message to {{ $data->name }} as notificacion

@component('mail::button', ['url' => '/home'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

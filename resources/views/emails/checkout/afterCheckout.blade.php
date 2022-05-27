@component('mail::message')
# Checkout Camp: {{ $checkout->Camp->title }}

Hi {{ $checkout->User->name }}
<br>
Thank you for your checkout on <b>{{ $checkout->Camp->title }}</b>, please see payment instruction by click the button below.

@component('mail::button', ['url' => route('dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

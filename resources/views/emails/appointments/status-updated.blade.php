@component('mail::message')
# Appointment Status Update

@if($appointment->status === 'confirmed')
Your appointment has been confirmed.
@elseif($appointment->status === 'cancelled')
Your appointment has been cancelled.
@if($appointment->cancel_reason)
Reason: {{ $appointment->cancel_reason }}
@endif
@elseif($appointment->status === 'completed')
Your appointment has been completed. Thank you for choosing {{ config('app.name') }}.
@else
Your appointment status has been updated to pending.
@endif

@component('mail::panel')
**Service:** {{ $appointment->service_name }}  
**Person to see:** {{ $appointment->person_to_see ?: 'No preference' }}  
**Date:** {{ optional($appointment->appointment_date)->format('F j, Y g:i A') }}  
**Status:** {{ ucfirst($appointment->status) }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

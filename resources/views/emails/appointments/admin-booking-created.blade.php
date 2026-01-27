@component('mail::message')
# New Appointment Booking

A new appointment has been booked. Details are below.

@component('mail::panel')
**Patient:** {{ $appointment->user?->name ?? 'N/A' }}  
**Email:** {{ $appointment->user?->email ?? 'N/A' }}  
**Service:** {{ $appointment->service_name }}  
**Person to see:** {{ $appointment->person_to_see ?: 'No preference' }}  
**Date:** {{ optional($appointment->appointment_date)->format('F j, Y g:i A') }}  
**Status:** {{ ucfirst($appointment->status) }}
@if($appointment->notes)
**Notes:** {{ $appointment->notes }}
@endif
@endcomponent

@component('mail::button', ['url' => $adminUrl])
View Bookings
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

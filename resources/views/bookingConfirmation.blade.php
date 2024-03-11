@component('mail::message')
# Booking Confirmation

Thank you for your booking.

**Name:** {{ $booking->name }}

**Vehicle Make & Model:** {{ $booking->vehicle_model }}

**Date:** {{ $booking->booked_date }}

**Time:** {{ $booking->booked_time }}

@component('mail::button', ['url' => ''])
View Booking
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

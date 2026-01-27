<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentCreatedAdminMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public Appointment $appointment)
    {
    }

    public function build(): self
    {
        $this->appointment->loadMissing(['user', 'service', 'staff']);

        return $this->subject('New appointment booking')
            ->markdown('emails.appointments.admin-booking-created', [
                'appointment' => $this->appointment,
                'adminUrl' => route('admin.appointments.index'),
            ]);
    }
}

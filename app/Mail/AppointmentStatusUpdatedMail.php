<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentStatusUpdatedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public Appointment $appointment)
    {
    }

    public function build(): self
    {
        $this->appointment->loadMissing(['user', 'service', 'staff']);

        $status = $this->appointment->status;
        $subject = match ($status) {
            'confirmed' => 'Your appointment is confirmed',
            'completed' => 'Your appointment is completed',
            'cancelled' => 'Your appointment was cancelled',
            default => 'Your appointment status update',
        };

        return $this->subject($subject)
            ->markdown('emails.appointments.status-updated', [
                'appointment' => $this->appointment,
            ]);
    }
}

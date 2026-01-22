<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'custom_service',
        'appointment_date',
        'status',
        'staff_id',
        'custom_person_to_see',
        'notes',

        'confirmed_at',
        'confirmed_by',
        'completed_at',
        'completed_by',
        'cancelled_at',
        'cancel_reason',
        'cancelled_by',
    ];

    protected $casts = [
        'appointment_date' => 'datetime',
        'confirmed_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    /**
     * The patient who made the appointment
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The service requested
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * The staff member to see
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    /**
     * Helper to get the service name
     */
    public function getServiceNameAttribute()
    {
        return $this->service ? $this->service->name : $this->custom_service;
    }

    /**
     * Helper to get the person to see
     */
    public function getPersonToSeeAttribute()
    {
        return $this->staff ? $this->staff->name : $this->custom_person_to_see;
    }

      public function confirmedBy()
    {
        return $this->belongsTo(User::class, 'confirmed_by');
    }

    public function completedBy()
    {
        return $this->belongsTo(User::class, 'completed_by');
    }

    public function cancelledBy()
    {
        return $this->belongsTo(User::class, 'cancelled_by');
    }

}

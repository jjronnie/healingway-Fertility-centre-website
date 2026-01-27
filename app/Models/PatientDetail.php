<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'gender',
        'date_of_birth',
        'marital_status',
        'occupation',
        'blood_group',
        'address',
        'city',
        'country',
        'emergency_contact_name',
        'emergency_contact_phone',
        'allergies',
        'medical_history',
        'notes',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

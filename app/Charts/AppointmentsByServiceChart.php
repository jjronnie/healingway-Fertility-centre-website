<?php

namespace App\Charts;

use App\Models\Appointment;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class AppointmentsByServiceChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        $rows = Appointment::leftJoin('services', 'appointments.service_id', '=', 'services.id')
            ->selectRaw("COALESCE(services.name, appointments.custom_service, 'Other') as service_label, COUNT(*) as total")
            ->groupBy('service_label')
            ->orderByDesc('total')
            ->limit(7)
            ->get();

        $this->labels($rows->pluck('service_label')->toArray());
        $this->options([
            'responsive' => true,
            'maintainAspectRatio' => false,
        ]);

        $this->dataset('Appointments', 'bar', $rows->pluck('total')->toArray())
            ->backgroundColor([
                '#3B82F6',
                '#10B981',
                '#F59E0B',
                '#EF4444',
                '#8B5CF6',
                '#14B8A6',
                '#6366F1',
            ]);
    }
}

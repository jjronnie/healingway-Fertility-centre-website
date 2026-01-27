<?php

namespace App\Charts;

use App\Models\Appointment;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class AppointmentStatusChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        $statusCounts = Appointment::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $order = ['pending', 'confirmed', 'completed', 'cancelled'];
        $labels = array_map('ucfirst', $order);
        $data = array_map(fn ($status) => $statusCounts[$status] ?? 0, $order);

        $this->labels($labels);
        $this->options([
            'responsive' => true,
            'maintainAspectRatio' => false,
        ]);

        $this->dataset('Appointments', 'doughnut', $data)
            ->backgroundColor([
                '#F59E0B', // pending
                '#3B82F6', // confirmed
                '#10B981', // completed
                '#EF4444', // cancelled
            ]);
    }
}

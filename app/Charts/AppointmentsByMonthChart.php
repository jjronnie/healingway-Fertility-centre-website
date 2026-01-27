<?php

namespace App\Charts;

use App\Models\Appointment;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class AppointmentsByMonthChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        $rows = Appointment::selectRaw("DATE_FORMAT(appointment_date, '%Y-%m') as ym, DATE_FORMAT(appointment_date, '%b %Y') as label, COUNT(*) as total")
            ->groupBy('ym', 'label')
            ->orderBy('ym', 'desc')
            ->limit(12)
            ->get()
            ->sortBy('ym');

        $this->labels($rows->pluck('label')->toArray());
        $this->options([
            'responsive' => true,
            'maintainAspectRatio' => false,
        ]);

        $this->dataset('Appointments', 'line', $rows->pluck('total')->toArray())
            ->backgroundColor('rgba(59, 130, 246, 0.2)')
            ->color('#3B82F6');
    }
}

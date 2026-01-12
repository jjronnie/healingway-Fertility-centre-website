<?php
namespace App\Charts;

use App\Models\User;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class SignupMethodChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        $methods = User::selectRaw('signup_method, COUNT(*) as total')
            ->whereNotNull('signup_method')
            ->groupBy('signup_method')
            ->pluck('total', 'signup_method');

        $this->labels($methods->keys()->toArray());

        $this->options([
            'responsive' => true,
            'maintainAspectRatio' => false,
        ]);

        $this->dataset('Total', 'pie', $methods->values()->toArray())
            ->backgroundColor([
                '#3B82F6', // email
                '#EA4335', // google
                '#1877F2', // facebook
                '#10B981', // others
            ]);
    }
}

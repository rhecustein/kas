<?php

namespace App\View\Components\Apexcharts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LineChart extends Component
{
    /**
     * Create a new instance of the chart component.
     *
     * @param string $chartTitle The title of the chart.
     * @param string $seriesTitle The title of the chart series.
     * @param string $chartID The unique identifier for the chart.
     * @param $series The data series for the chart.
     * @param $categories The categories or labels for the chart data.
     */
    public function __construct(
        public string $chartTitle,
        public string $seriesTitle,
        public string $chartID,
        public $series,
        public $categories
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.apexcharts.line-chart');
    }
}

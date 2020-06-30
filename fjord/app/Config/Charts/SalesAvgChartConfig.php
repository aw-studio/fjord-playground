<?php

namespace FjordApp\Config\Charts;

use Fjord\Chart\Chart;
use Illuminate\Support\Collection;
use Fjord\Chart\Config\AreaChartConfig;

class SalesAvgChartConfig extends AreaChartConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = \App\Models\Sale::class;

    /**
     * Chart title.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Average Sale Price';
    }

    /**
     * Mount.
     *
     * @param Chart $chart
     * @return void
     */
    public function mount(Chart $chart)
    {
        $chart->currency('€');
    }

    /**
     * Calculate value.
     *
     * @param Builder $query
     * @return integer
     */
    public function value($query)
    {
        return $this->average($query, 'price');
    }
}

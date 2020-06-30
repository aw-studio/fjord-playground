<?php

namespace FjordApp\Config\Charts;

use Fjord\Chart\Chart;
use Illuminate\Support\Collection;
use Fjord\Chart\Config\ProgressChartConfig;

class SalesProgressChartConfig extends ProgressChartConfig
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
        return 'Progress';
    }

    /**
     * Calculate value.
     *
     * @param Builder $query
     * @return integer
     */
    public function value($query)
    {
        return $this->count($query);
    }

    /**
     * Get maximum value.
     *
     * @return integer|float
     */
    public function goal()
    {
        return 100;
    }
}

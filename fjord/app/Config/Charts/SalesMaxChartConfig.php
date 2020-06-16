<?php

namespace FjordApp\Config\Charts;

use Fjord\Chart\Chart;
use Illuminate\Support\Collection;
use Fjord\Chart\Config\AreaChartConfig;

class SalesMaxChartConfig extends AreaChartConfig
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
        return 'Max Sale Price';
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
    public function value($query): int
    {
        return $query->selectRaw('MAX(price) as max')->first()->max ?? 0;
    }

    /**
     * Number that is displayed at the bottom left corner.
     *
     * @param \Illuminate\Support\Collection
     * @return integer
     */
    public function result(Collection $values): int
    {
        return $values->avg() ?: 0;
    }
}

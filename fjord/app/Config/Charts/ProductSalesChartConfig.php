<?php

namespace FjordApp\Config\Charts;

use Fjord\Chart\Chart;
use Fjord\Chart\Config\DonutChartConfig;

class ProductSalesChartConfig extends DonutChartConfig
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
        return 'Product Sales';
    }

    /**
     * Mount.
     *
     * @param Chart $chart
     * @return void
     */
    public function mount(Chart $chart)
    {
        $chart->format('0');
    }

    /**
     * Value.
     *
     * @param Builder $query
     * @return array
     */
    public function value($query): array
    {
        return [
            (clone $query)->where('product', 'shoe')->count(),
            (clone $query)->where('product', 'shirt')->count(),
            (clone $query)->where('product', 'jacket')->count(),
        ];
    }

    /**
     * Labels.
     *
     * @return array
     */
    public function labels(): array
    {
        return [
            'Shoes',
            'Shirts',
            'Jackets'
        ];
    }
}

<?php

namespace FjordApp\Config\Form\Charts;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Charts\DonutController;

class DonutConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = DonutController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "charts/donut";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Donut Chart <span class="badge badge-success">New</span>',
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $container
     * @return void
     */
    public function show(CrudShow $container)
    {
        $container->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Charts/ProductSalesChartConfig.php" target="_blank">See the code for this chart on github.</a>')
            ->width(12);

        $container->chart('charts.product_sales_chart')->variant('primary')->width(1 / 3);
        $container->chart('charts.product_sales_chart')->variant('secondary')->width(1 / 3);
        $container->chart('charts.product_sales_chart')->variant('white')->width(1 / 3);
    }
}

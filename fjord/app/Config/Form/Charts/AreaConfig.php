<?php

namespace FjordApp\Config\Form\Charts;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Charts\AreaController;

class AreaConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = AreaController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "charts/area";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Area Chart <span class="badge badge-success">New</span>',
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $formcontainer
     * @return void
     */
    public function show(CrudShow $container)
    {
        $container->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Charts/SalesCountChartConfig.php" target="_blank">See the code for this chart on github.</a>')
            ->width(6);
        $container->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Charts/SalesAvgChartConfig.php" target="_blank">See the code for this chart on github.</a>')
            ->width(6);

        $container->chart('charts.sales_count_chart')->variant('primary')->width(1 / 2)->height('200px');
        $container->chart('charts.product_sales_chart')->variant('secondary')->width(1 / 3);
        $container->chart('charts.sales_avg_chart')->variant('white')->width(1 / 2)->height('200px');

        $container->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Charts/SalesMaxChartConfig.php" target="_blank">See the code for this chart on github.</a>')
            ->width(4);

        $container->chart('charts.sales_max_chart')->variant('white')->width(12)->height('250px');
    }
}

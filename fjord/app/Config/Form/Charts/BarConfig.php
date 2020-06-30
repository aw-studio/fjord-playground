<?php

namespace FjordApp\Config\Form\Charts;

use FjordApp\Controllers\Form\Charts\BarController;
use Fjord\Crud\Config\FormConfig;
use Fjord\Crud\CrudShow;
use FjordApp\Config\Charts\SalesCountBarChartConfig;

class BarConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = BarController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "charts/bar";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Bar Chart <span class="badge badge-success">New</span>',
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
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Charts/SalesCountBarChartConfig.php" target="_blank">See the code for this chart on github.</a>')
            ->width(12);

        $container->chart(SalesCountBarChartConfig::class)->variant('primary')->width(1 / 3);
        $container->chart(SalesCountBarChartConfig::class)->variant('secondary')->width(1 / 3);
        $container->chart(SalesCountBarChartConfig::class)->variant('white')->width(1 / 3);
    }
}

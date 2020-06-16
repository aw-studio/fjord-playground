<?php

namespace FjordApp\Config\Form\Dashboards;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Dashboard\MainDashboardController;

class MainDashboardConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = MainDashboardController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "/";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Dashboard',
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
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Dashboards/MainDashboardConfig.php" target="_blank">See the code for this dashboard on github.</a>')
            ->width(12)
            ->class('mb-4');

        $container->chart('charts.product_sales_chart')->variant('secondary')->width(1 / 3)->height('200px');
        $container->chart('charts.sales_count_chart')->variant('primary')->width(1 / 3)->height('200px');
        $container->chart('charts.sales_avg_chart')->variant('secondary')->width(1 / 3)->height('200px');
        $container->chart('charts.sales_max_chart')->variant('white')->width(12)->height('250px');
    }
}

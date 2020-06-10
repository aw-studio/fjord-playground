<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\RangeController;

class RangeConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = RangeController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/range';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Range Slider',
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Fields/RangeConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/range/" target="_blank">Read the docs.</a>')
            ->width(12);

        $form->card(function ($form) {
            $form->range('range')
                ->title('Range')
                ->min(1)
                ->max(25)
                ->step(1)
                ->hint('Range.');
        });
    }
}

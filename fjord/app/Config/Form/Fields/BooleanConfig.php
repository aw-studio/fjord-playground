<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\BooleanController;

class BooleanConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = BooleanController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/boolean';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Boolean Field',
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
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Fields/BooleanConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/boolean/" target="_blank">Read the docs.</a>')
            ->width(12);

        $form->card(function ($form) {

            $form->boolean('active')
                ->title('Switch')
                ->hint('Boolean field.');
        });
    }
}

<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\CheckboxesController;

class CheckboxesConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = CheckboxesController::class;

    /**
     * Form route checkboxes.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/checkboxes';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Checkboxes Field',
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
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Fields/CheckboxesConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/checkboxes/" target="_blank">Read the docs.</a>')
            ->width(12);

        $form->card(function ($form) {
            $form->checkboxes('fruits')
                ->title('Fruits')
                ->options([
                    'orange' => 'Orange',
                    'apple' => 'Apple',
                    'pineapple' => 'Pineapple',
                    'grape' => 'Grape',
                ])
                ->hint('Checkboxes field.')
                ->width(6);
        });
    }
}

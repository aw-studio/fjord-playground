<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\InputController;

class InputConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = InputController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'input';

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'input',
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Fields/InputConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/input/" target="_blank">Read the docs.</a>')
            ->width(12);

        $form->card(function ($form) {
            $form->input('title')
                ->title('Title')
                ->hint('Basic input field.')
                ->width(1 / 2);

            $form->input('length')
                ->title('Length')
                ->type('number')
                ->placeholder('The length in cm')
                ->hint('Number input field with an append.')
                ->append('cm')
                ->width(1 / 2);
        });
    }
}

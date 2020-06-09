<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\CodeController;

class CodeConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = CodeController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'code';

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Code Editor',
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
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Fields/CodeConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/code/" target="_blank">Read the docs.</a>')
            ->width(12);

        $form->card(function ($form) {
            $form->code('code')
                ->title('Code')
                ->hint('Default language is html.');

            $form->code('js_code')
                ->title('Code')
                ->language('text/javascript')
                ->hint('Javascript language.');

            $form->code('js_code_theme')
                ->title('Code')
                ->language('text/javascript')
                ->theme('oceanic-next')
                ->hint('Different theme.');
        });
    }
}

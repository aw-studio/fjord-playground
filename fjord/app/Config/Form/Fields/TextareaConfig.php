<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\TextareaController;

class TextareaConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TextareaController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/textarea';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Textarea <span class="badge badge-success">New</span>',
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
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Fields/TextareaConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/textarea/" target="_blank">Read the docs.</a>')
            ->width(12);

        $form->card(function ($form) {
            $form->textarea('text')
                ->translatable()
                ->title('Description')
                ->placeholder('Type something...')
                ->hint('Textarea Field.');

            $form->textarea('text')
                ->translatable()
                ->maxRows(10)
                ->title('maxRows 10 <span class="badge badge-success">New</span>')
                ->placeholder('Type something...')
                ->hint('maxRows 10.');

            $form->textarea('text')
                ->translatable()
                ->rows(2)
                ->maxRows(2)
                ->title('rows 2 <span class="badge badge-success">New</span>')
                ->placeholder('Type something...')
                ->hint('rows 2, maxRows 2.');
        });
    }
}

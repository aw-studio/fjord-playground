<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\ModalController;

class ModalConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ModalController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/modal';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'modal',
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
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Fields/ModalConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/modal/" target="_blank">Read the docs.</a>')
            ->width(12);

        $form->card(function ($form) {
            $form->modal('update')
                ->title('Modal')
                ->name('Basic form modal')
                ->form(function ($form) {
                    $form->wysiwyg('text')->title('Text');
                });

            $form->modal('update_email')
                ->title('Confirm modal with password.')
                ->name('Update E-Mail')
                ->confirmWithPassword()
                ->form(function ($form) {
                    $form->input('email')->title('E-Mail');
                });

            $form->modal('change_email')
                ->title('Modal value gets displayed')
                ->variant('primary')
                ->preview('{email}')
                ->name('Change E-Mail')
                ->form(function ($modal) {
                    $modal->input('email')
                        ->width(12)
                        ->rules('required')
                        ->title('E-Mail');
                })->width(6);
        });
    }
}

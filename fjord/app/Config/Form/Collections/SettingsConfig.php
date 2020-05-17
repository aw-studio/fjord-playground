<?php

namespace FjordApp\Config\Form\Collections;

use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;
use Fjord\Crud\Config\Traits\HasCrudForm;
use FjordApp\Controllers\Form\Collections\SettingsController;

class SettingsConfig extends FormConfig
{
    use HasCrudForm;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = SettingsController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'settings';

    public function names()
    {
        return [
            'singular' => 'Settings'
        ];
    }

    /**
     * Setup form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->info('Site Settings')
            ->text('Settings are a good example of <b>Forms</b>. The data structure is flexible and the field data can be loaded globally.')
            ->text('Learn how to create forms in the <a href="https://www.fjord-admin.com/docs/crud/forms/" target="_blank">Forms</a> section in the documentation.')
            ->cols(4);
        $form->card(function ($form) {
            $form->input('title')
                ->title('Title')
                ->cols(8)
                ->placeholder('Title')
                ->hint('Website title.');

            $form->input('company')
                ->title('Company')
                ->cols(8)
                ->placeholder('Company')
                ->hint('Company name is displayed in the footer.');

            $form->input('phone')
                ->title('Phonenumber')
                ->rules('regex:/(01)[0-9]{9}/')
                ->cols(6)
                ->hint('Phonenumber.');

            $form->input('mobilephone')
                ->title('Mobile phonenumber')
                ->cols(6)
                ->rules('regex:/(01)[0-9]{9}/')
                ->hint('Mobile phonenumber.');

            $form->textarea('address')
                ->title('Adress')
                ->cols(8)
                ->placeholder('Adress')
                ->hint('Company address.');
        })->cols(8);
    }
}

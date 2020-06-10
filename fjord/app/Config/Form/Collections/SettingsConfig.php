<?php

namespace FjordApp\Config\Form\Collections;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Collections\SettingsController;

class SettingsConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = SettingsController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'settings';
    }

    /**
     * Form names.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Settings'
        ];
    }

    /**
     * Setup form.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Collections/SettingsConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('Site Settings')
            ->text('Settings are a good example of <b>Forms</b>. The data structure is flexible and the field data can be loaded globally.')
            ->text('Learn how to create forms in the <a href="https://www.fjord-admin.com/docs/crud/forms/" target="_blank">Forms</a> section in the documentation.')
            ->width(4);
        $form->card(function ($form) {
            $form->input('title')
                ->title('Title')
                ->width(8)
                ->placeholder('Title')
                ->hint('Website title.');

            $form->input('company')
                ->title('Company')
                ->width(8)
                ->placeholder('Company')
                ->hint('Company name is displayed in the footer.');

            $form->input('phone')
                ->title('Phonenumber')
                ->rules('regex:/(01)[0-9]{9}/')
                ->width(6)
                ->hint('Phonenumber.');

            $form->input('mobilephone')
                ->title('Mobile phonenumber')
                ->width(6)
                ->rules('regex:/(01)[0-9]{9}/')
                ->hint('Mobile phonenumber.');

            $form->textarea('address')
                ->title('Adress')
                ->width(8)
                ->placeholder('Adress')
                ->hint('Company address.');
        })->width(8);
    }
}

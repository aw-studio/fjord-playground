<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\ImageController;

class ImageConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ImageController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'image';

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'image',
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
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Fields/ImageConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/image/" target="_blank">Read the docs.</a>')
            ->width(12);

        $form->card(function ($form) {
            $form->image('images')
                ->translatable()
                ->title('Translatable images and crop.')
                ->hint('Translatable and crop.')
                ->crop(3 / 4)
                ->maxFiles(5);

            $form->image('first_big_images')
                ->title('firstBig')
                ->firstBig()
                ->hint('First image is displayed big.')
                ->maxFiles(5);
        });
    }
}

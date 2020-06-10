<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
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
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/image';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Image <span class="badge badge-success">New</span>',
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

            $form->image('expand_image')
                ->title('Expand Image <span class="badge badge-success">New</span>')
                ->hint('expand.')
                ->expand()
                ->maxFiles(1);
        });
    }
}

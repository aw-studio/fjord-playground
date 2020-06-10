<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\BlockController;

class BlockConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = BlockController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/block';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Block Field',
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
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Fields/BlockConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/block/" target="_blank">Read the docs.</a>')
            ->width(12);

        $form->card(function ($form) {
            $form->block('content')
                ->title('Content')
                ->repeatables(function ($repeatables) {

                    // Add as many repeatables as you want.
                    $repeatables->add('text', function ($form, $preview) {
                        // The block preview.
                        $preview->col('{text}');

                        // Containing as many form fields as you want.
                        $form->input('text')
                            ->title('Text');
                    });

                    $repeatables->add('image', function ($form, $preview) {
                        $preview->col('{image.media_converions.sm}');

                        $form->image('image')
                            ->maxFiles(1)
                            ->title('Image');
                    });
                });
        });
    }
}

<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudForm;
use App\Models\Department;
use Fjord\Crud\Config\FormConfig;
use Fjord\Vue\Crud\RelationTable;
use Fjord\Crud\Config\Traits\HasCrudForm;
use Fjord\Crud\Fields\Blocks\Repeatables;
use FjordApp\Controllers\Form\Pages\HomeController;

class HomeConfig extends FormConfig
{
    use HasCrudForm;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = HomeController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'home';

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->card(function ($form) {
        })->cols(12);

        $form->card(function ($form) {
            $form->blocks('cards')
                ->title('Cards')
                ->blockCols(4)
                ->repeatables(function ($rep) {
                    $rep->add('card', function ($form, $preview) {
                        $preview->col('{icon}');

                        $form->icon('icon')
                            ->title('Icon')
                            ->cols(12);
                        $form->input('title')
                            ->title('Title')
                            ->cols(12);
                        $form->textarea('text')
                            ->title('Description')
                            ->cols(12);
                    });
                });
        })->cols(12);

        $form->card(function ($form) {
            $form->input('portfolio_title')
                ->translatable()
                ->title('Title')
                ->hint('Portfolio title')
                ->cols(12);

            $form->wysiwyg('portfolio_text')
                ->translatable()
                ->title('Text')
                ->hint('Portfolio text')
                ->cols(12);

            $form->blocks('portfolio_images')
                ->title('Images')
                ->blockCols(12)
                ->repeatables(function ($rep) {
                    $rep->add('category', function ($form, $preview) {
                        $preview->col('Image');

                        $form->input('name')
                            ->translatable()
                            ->title('Category Name')
                            ->cols(12);

                        $form->image('images')
                            ->maxFiles(5)
                            ->crop(1 / 1)
                            ->cols(12);
                    });
                });
        })->cols(12)->title('Portfolio');
    }
}

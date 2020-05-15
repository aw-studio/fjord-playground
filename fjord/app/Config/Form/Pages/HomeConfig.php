<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;
use Fjord\Crud\Config\Traits\HasCrudForm;
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

    public function previewRoute()
    {
        return route('home');
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->card(function ($form) {

            $form->col(7, function ($form) {
                $form->input('header')
                    ->translatable()
                    ->title('Header')
                    ->hint('Big header.')
                    ->cols(12);

                $form->text('text')
                    ->translatable()
                    ->title('Text')
                    ->hint('Text below header.')
                    ->cols(12);
            });

            $form->image('image')
                ->title('Header Image')
                ->maxFiles(1)
                ->firstBig()
                ->cols(5);
        })->cols(12)->title('Landing');

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
                        $preview->col('{name}')->small();

                        $preview->image()
                            ->src('{first_images.conversion_urls.sm}')
                            ->square('50px');

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

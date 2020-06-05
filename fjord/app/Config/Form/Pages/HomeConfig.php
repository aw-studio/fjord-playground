<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;
use Illuminate\Support\Facades\File;
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
        $form->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Pages/HomeConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->card(function ($form) {

            $form->group(function ($form) {
                $form->input('header')
                    ->translatable()
                    ->title('Header')
                    ->hint('Big header.');

                $form->markdown(File::get(__DIR__ . '/Header.md'));

                $form->text('text')
                    ->translatable()
                    ->title('Text')
                    ->hint('Text below header.')
                    ->width(12);
            })->width(7);

            $form->image('image')
                ->title('Header Image')
                ->maxFiles(1)
                ->firstBig()
                ->width(5);
        })->width(12)->title('Landing');

        $form->card(function ($form) {
            $form->info('Blocks')
                ->text('Here is an example of <a href="https://www.fjord-admin.com/docs/fields/blocks" target="_blank">blocks</a>, with them you can add and sort form field groups.')
                ->width(12);

            $form->blocks('cards')
                ->title('Cards')
                ->blockWidth(1 / 3)
                ->repeatables(function ($rep) {
                    $rep->add('card', function ($form, $preview) {
                        $preview->col('{icon}');

                        $form->icon('icon')
                            ->title('Icon')
                            ->width(12);
                        $form->input('title')
                            ->title('Title')
                            ->width(12);
                        $form->textarea('text')
                            ->title('Description')
                            ->width(12);
                    });
                });

            //$form->markdown(File::get(__DIR__ . '/Blocks.md'));
        })->width(12);

        $form->card(function ($form) {
            $form->input('portfolio_title')
                ->translatable()
                ->title('Title')
                ->hint('Portfolio title')
                ->width(12);

            $form->wysiwyg('portfolio_text')
                ->translatable()
                ->title('Text')
                ->hint('Portfolio text')
                ->width(12);

            $form->blocks('portfolio_images')
                ->title('Images')
                ->blockWidth(12)
                ->repeatables(function ($rep) {
                    $rep->add('category', function ($form, $preview) {
                        $preview->col('{name}')->small();

                        $preview->image()
                            ->src('{first_images.conversion_urls.sm}')
                            ->square('50px');

                        $form->input('name')
                            ->translatable()
                            ->title('Category Name')
                            ->width(12);

                        $form->image('images')
                            ->title('Image')
                            ->maxFiles(5)
                            ->crop(1 / 1)
                            ->width(12);
                    });
                });
        })->width(12)->title('Portfolio');
    }
}

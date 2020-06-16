<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\ListController;

class ListConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ListController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "fields/list";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'List <span class="badge badge-success">New</span>',
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $container
     * @return void
     */
    public function show(CrudShow $container)
    {
        $container->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Fields/ListConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/list/" target="_blank">Read the docs.</a>')
            ->width(12);

        $container->card(function ($form) {

            $form->info('List Field')
                ->text('Add form fields to nested lists and use them to create <b>menues</b> in no time.')
                ->width(12);

            $form->list('menue')
                ->title('Menue')
                ->previewTitle('{title}')
                ->form(function ($form) {
                    $form->input('title')
                        ->title('Title');

                    $form->text('text')
                        ->title('Text');
                });

            $form->markdown("
```php
\$form->list('menue')
    ->title('Menue')
    ->previewTitle('{title}')
    ->form(function (\$form) {
        \$form->input('title')
            ->title('Title');

        \$form->text('text')
            ->title('Text');
    });
```
");
        });
    }
}

<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\WysiwygController;

class WysiwygConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = WysiwygController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/wysiwyg';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Wysiwyg <span class="badge badge-success">New</span>',
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
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Fields/WysiwygConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/wysiwyg/" target="_blank">Read the docs.</a>')
            ->width(12);

        $form->card(function ($form) {
            $form->wysiwyg('text')
                ->translatable()
                ->colors([
                    '#4951f2', '#f67693', '#f6ed76', '#9ff2ae', '#83c2ff'
                ])
                ->title('Description')
                ->hint('What you see is what you get field.');

            $form->markdown("
```php
\$form->wysiwyg('text')
    ->translatable()
    ->colors([
        '#4951f2', '#f67693', '#f6ed76', '#9ff2ae', '#83c2ff'
    ])
    ->title('Description')
    ->hint('What you see is what you get field.');
```
");
        });
    }
}

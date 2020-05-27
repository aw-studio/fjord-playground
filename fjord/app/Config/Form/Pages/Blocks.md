The blocks are created with the following code.

```php
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
```

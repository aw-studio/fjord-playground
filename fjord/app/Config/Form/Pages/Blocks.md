The blocks were created with the following code.

```php
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
```

<?php



return [
    'form_fields' => [
        [
            'translatable' => true,
            'id' => 'h1',
            'type' => 'input',
            'title' => 'Headline',
            'placeholder' => 'Headline',
            'hint' => 'The Headline needs to be filled',
            'width' => 12
        ],
        [
            'id' => 'executives',
            'type' => 'relation',
            'model' => \App\Models\Employee::class,
            'edit' => 'employees',
            'many' => true,
            'preview' => [
                [
                    'type' => 'image',
                    'key' => 'image.conversion_urls.sm'
                ],
                '{fullName}',
            ],
            'title' => 'Executives',
            'hint' => 'Choose the company\'s executives.',
            'width' => 12,
            'button' => 'Add Executive'
        ],
        [
            'id' => 'content_block',
            'type' => 'block',
            'title' => 'Content',
            'hint' => 'The Headline needs to be filled',
            'width' => 12,
            'repeatables' => [
                'text', 'image'
            ]
        ],
    ]
];

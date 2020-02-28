<?php

//use \App\Models\ProjectStatus;

return [
    //'preview_route' => [ProjectStatus::class, 'getRoute'],
    'index' => [
        'preview' => [
            [
                'key' => '{title}',
                'label' => 'Title'
            ]
        ],
        'search' => ['title', 'text'],
        'sort_by' => [
            'id.desc' => 'New -> Old',
            'id.asc' => 'Old -> New',
        ],
        'sort_by_default' => 'id.desc',
        // 'per_page' => 20,
        // 'filter' => [
        //     'GroupName' => [
        //         'scopeName' => 'Description',
        //     ],
        // ],
        //
        // Models that should be eager-loaded
        // 'load' => [
        //     'user' => App\Models\User::class
        // ]
    ],
    // 'names' => [
    //     'singular' => 'Singular',
    //     'plural' => 'Plural'
    // ],
    'form_fields' => [
        // [
        //     [
        //         'type' => 'input',
        //         'id' => 'title',
        //         'max' => 60,
        //         'title' => 'Title',
        //         'placeholder' => 'Title',
        //         'hint' => 'The title needs to be filled',
        //         'width' => 8
        //     ]
        // ]
    ]
];

<?php

return [
    //'preview_route' => [Department::class, 'getRoute'],
    'index' => [
        'preview' => [
            [
                'key' => '{name}',
                'label' => 'Department Name'
            ],
            [
                'key' => '{employees_count}',
                'label' => 'Employees'
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
        'load' => [
            // 'employees' => App\Models\Employee::class
        ]
    ],
    // 'names' => [
    //     'singular' => 'Singular',
    //     'plural' => 'Plural'
    // ],
    'form_fields' => [
        [
            [
                'type' => 'input',
                'id' => 'name',
                'max' => 60,
                'title' => 'Name',
                'placeholder' => 'Department Name',
                'hint' => 'The department\'s name needs to be filled',
                'width' => 8
            ]
        ],
        [
            [
                'id' => 'employees',
                'type' => 'hasMany',
                'model' => \App\Models\Employee::class,
                'foreign_key' => 'department_id',
                'preview' => [
                    [
                        'key' => '{fullName}',
                        'label' => 'Name'
                    ],
                ],
                'title' => 'Staff',
                'hint' => 'Select Staff',
                'width' => 12,
            ],
        ]
    ]
];

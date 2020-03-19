<?php

return [
    [
        'Collections',
        [
            'title' => 'Pages',
            'icon' => '<i class="fas fa-file"></i>',
            'children' => [
                [
                    'title' => 'Home',
                    'link' => 'pages/home',
                    'icon' => '<i class="fas fa-home"></i>'
                ],
            ],
        ],
    ],
    [
        'Crud',
        [
            'title' => 'Departments',
            'link' => 'departments',
            'icon' => '<i class="fas fa-building"></i>'
        ],
        [
            'title' => 'Employees',
            'link' => 'employees',
            'icon' => '<i class="fas fa-users"></i>'
        ],
        [
            'title' => 'Projects',
            'link' => 'projects',
            'icon' => '<i class="fas fa-project-diagram"></i>'
        ],
    ],
    [
        'component' => 'example'
    ]
];

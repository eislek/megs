<?php

return [
    'controllers' => [
        'invokables' => [
            'Blacklist\Controller\Blacklist' => Blacklist\Controller\BlacklistController::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'blacklist' => __DIR__ . '/../view'
        ]
    ],

    'router' => [
        'routes' => [
            'blacklist' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/blacklist[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => 'Blacklist\Controller\Blacklist',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ]
];

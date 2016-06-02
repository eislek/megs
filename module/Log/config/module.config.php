<?php

return [
    'controllers' => [
        'invokables' => [
            'Log\Controller\Log' => Log\Controller\LogController::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'log' => __DIR__ . '/../view'
        ]
    ],

    'router' => [
        'routes' => [
            'log' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/log[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => 'Log\Controller\Log',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ]
];

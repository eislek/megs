<?php

return [
    'controllers' => [
        'invokables' => [
            'Erinnerung\Controller\Erinnerung' => Erinnerung\Controller\ErinnerungController::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'erinnerung' => __DIR__ . '/../view'
        ]
    ],

    'router' => [
        'routes' => [
            'erinnerung' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/erinnerung[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => 'Erinnerung\Controller\Erinnerung',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ]
];

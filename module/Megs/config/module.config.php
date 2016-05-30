<?php

return [
    'controllers' => [
        'invokables' => [
            'Megs\Controller\Erinnerung' => Megs\Controller\ErinnerungController::class,
            'Megs\Controller\Benutzer' => Megs\Controller\BenutzerController::class,
            'Megs\Controller\Blacklist' => Megs\Controller\BlacklistController::class,
            'Megs\Controller\Log' => Megs\Controller\LogController::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'erinnerung' => __DIR__ . '/../view'
        ]
    ],

    'router' => [
        'routes' => [
            'megs' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/megs[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => 'Megs\Controller\Erinnerung',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ]
];
<?php

return [
    'controllers' => [
        'invokables' => [
            'Megs\Controller\Erinnerung' => Erinnerung\Controller\ErinnerungController::class,
            'Megs\Controller\Erinnerung' => Erinnerung\Controller\BenutzerController::class,
            'Megs\Controller\Erinnerung' => Erinnerung\Controller\BlacklistController::class,
            'Megs\Controller\Erinnerung' => Erinnerung\Controller\LogController::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view'
        ]
    ],

    'router' => [
        'routes' => [
            'album' => [
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
<?php

return [
    'controllers' => [
        'invokables' => [
            'Test\Controller\Erinnerung' => Megs\Controller\ErinnerungController::class,
            'Test\Controller\Benutzer'   => Megs\Controller\BenutzerController::class,
            'Test\Controller\Blacklist'  => Megs\Controller\BlacklistController::class,
            'Test\Controller\Log'        => Megs\Controller\LogController::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'megs' => __DIR__ . '/../view'
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
                        'controller' => 'Test\Controller\Erinnerung',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ]
];
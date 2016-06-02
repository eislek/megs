<?php

return [
    'controllers' => [
        'invokables' => [
            'Benutzer\Controller\Benutzer' => Benutzer\Controller\BenutzerController::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'benutzer' => __DIR__ . '/../view'
        ]
    ],

    'router' => [
        'routes' => [
            'benutzer' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/benutzer[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => 'Benutzer\Controller\Benutzer',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ]
];

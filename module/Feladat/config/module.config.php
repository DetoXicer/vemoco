<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Feladat\Controller\Feladat' => 'Feladat\Controller\FeladatController',
        ),
    ),
	
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'events' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/events[/:id][/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Feladat\Controller\Feladat',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'feladat' => __DIR__ . '/../view',
        ),
    ),
);
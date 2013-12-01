<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonAdministrator for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Administrator\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/administrator',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Administrator\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Administrator\Controller',
                        'controller' => 'role',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/:postId]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'postId' => '[a-zA-Z0-9_-]*'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Administrator\Controller',
                                'controller' => 'Role',
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
            'admin' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/administrator/index[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Administrator\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                )
            ),
            'role' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/administrator/role[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Administrator\Controller',
                        'controller' => 'role',
                        'action' => 'index',
                    ),
                )
            )
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Administrator\Controller\Index' => 'Administrator\Controller\IndexController',
            'Administrator\Controller\Role' => 'Administrator\Controller\RoleController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'administrator/index/index' => __DIR__ . '/../view/administrator/index/index.phtml',
            'administrator/index/edit' => __DIR__ . '/../view/administrator/index/edit.phtml',
            'administrator/index/add' => __DIR__ . '/../view/administrator/index/add.phtml',
            'administrator/index/delete' => __DIR__ . '/../view/administrator/index/delete.phtml',
            'administrator/index/userList' => __DIR__ . '/../view/administrator/index/user-list.phtml',
            'administrator/role/index' => __DIR__ . '/../view/administrator/role/index.phtml',
            'administrator/role/edit' => __DIR__ . '/../view/administrator/role/edit.phtml',
            'administrator/role/add' => __DIR__ . '/../view/administrator/role/add.phtml',
            'administrator/role/delete' => __DIR__ . '/../view/administrator/role/delete.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);

<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Store;  
   
use Zend\ServiceManager\Factory\InvokableFactory; 
use Zend\Router\Http\Segment;  


return array(
    'controllers' => array(
        'invokables' => array(
            'Store\Controller\Store' => 'Store\Controller\StoreController'
        ),
    ),

    'router' => array(
        'routes' => array(
            'store' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/store[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Store\Controller\Store',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),


    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'store/index/index' => __DIR__ . '/../view/store/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            'store' => __DIR__ . '/../view',
        ),
    ),

);

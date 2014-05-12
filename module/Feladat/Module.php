<?php
namespace Feladat;

use Feladat\Model\Feladat;
use Feladat\Model\FeladatTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
	// Add this method:
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Feladat\Model\FeladatTable' =>  function($sm) {
                    $tableGateway = $sm->get('FeladatTableGateway');
                    $table = new FeladatTable($tableGateway);
                    return $table;
                },
                'FeladatTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Feladat());
                    return new TableGateway('events', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
<?php namespace Blacklist;

use Album\Model\Album;
use Album\Model\AlbumTable;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ServiceManager\ServiceManager;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface {

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Return an array for passing to Zend\Loader\AutoloaderFactory.
     *
     * @return array
     */
    public function getAutoloaderConfig() {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ]
            ]
        ];
    }

    public function getServiceConfig() {
        return [
            'factories' => [
                'Log\Model\BenutzerTable' => function(ServiceManager $sm) {
                    /** @var TableGateway $tableGateway */
                    $tableGateway = $sm->get('BenutzerTableGateway');
                    $table = new BenutzerTable($tableGateway);
                    return $table;
                },
                'BenutzerTableGateway' => function(ServiceManager $sm) {
                    /** @var AdapterInterface $dbA */
                    $dbA = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Benutzer());
                    return new TableGateway('blacklist', $dbA, null, $resultSetPrototype);
                }
            ]
        ];
    }
}

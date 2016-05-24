<?php namespace Megs;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;


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
                'Erinnerung\Model\ErinnerungTable' => function(ServiceManager $sm) {
                    /** @var TableGateway $tableGateway */
                    $tableGateway = $sm->get('ErinnerungTableGateway');
                    $table = new ErinnerungTable($tableGateway);
                    return $table;
                },
                'ErinnerungTableGateway' => function(ServiceManager $sm) {
                    /** @var AdapterInterface $dbA */
                    $dbA = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Erinnerung());
                    return new TableGateway('megs', $dbA, null, $resultSetPrototype);
                }
            ]
        ];
    }
}

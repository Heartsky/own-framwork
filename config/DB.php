<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Yaml\Yaml;

class DB {

    private static $database = null;
    private static $isLoad = false;
    public $em;
    private function __construct($database, $isDevMode = false) {

        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."../../src/Modal/Entity"), $isDevMode);
        $connectionOptions = array(
            'driver'   => 'pdo_mysql',
            'host'     => $database['host'],
            'dbname'   => $database['database'],
            'user'     => $database['user'],
            'password' => $database['password']
        );
        $em = EntityManager::create($connectionOptions, $config);

        $this->em = $em;

    }

    public static function getInstance($isDevMode = false){

        if(empty( self::$database) && self::$isLoad == false){
            $config = Yaml::parseFile(__DIR__.'/config.yml');
            self::$database = new DB($config['database'], $isDevMode);
            self::$isLoad = true;

        }
        return self::$database;
    }



}
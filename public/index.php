<?php

use Phalcon\Mvc\Micro\Collection;
use Phalcon\Mvc\Micro;
use Phalcon\DI\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as Database;
use Phalcon\Url;

try {
    $rootPath = dirname(__DIR__);
    require_once $rootPath . '/vendor/autoload.php';
    /**
     * Read the configuration
     */
    $config = include $rootPath . '/config/config.php';

    $app = new Micro();

    $di = new FactoryDefault();

    /**
     * The URL component is used to generate all kind of urls in the application
     */
//    $di->set('url', function () use ($config) {
//        $url = new Url();
//        $url->setBaseUri($config->application->baseUri);
//
//        return $url;
//    });

    /**
     * Database connection is created based in the parameters defined in the configuration file
     */
    $di->set('db', function () use ($config) {
        return new Database(
            [
                "host"     => $config->database->host,
                "username" => $config->database->username,
                "password" => $config->database->password,
                "dbname"   => $config->database->name
            ]
        );
    });

    /**
     * Starting the application
     */

    $categories = new Collection();

    $categories->setHandler(
        new Api\Controllers\CategoriesController()
    )
        ->setPrefix('/categories');

    $categories->get("/", "index");
    $categories->get("/goods/{id}","goods");
    $app->mount($categories);

    $goods = new Collection();
    $goods->setHandler(
        new Api\Controllers\GoodsController()
    )
        ->setPrefix('/goods')
        ->get("/{id}","good");
    $app->mount($goods);

    $app->handle($_SERVER['REQUEST_URI']);
} catch (\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
    echo $e->getTraceAsString();
}
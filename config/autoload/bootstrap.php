<?php
// autoload.php
// Include Composer Autoload (relative to project root).

require_once __DIR__ . '/../../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [[__DIR__ . '/../../src/Authentication/src/Entity']];
$isDevMode = false;

// the connection configuration
$dbParams = [
    'driver'   => 'pdo_mysql',
    'dbname' => 'crafttekk-mod-console',
    'user' => 'testing',
    'password' => '1234',
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once __DIR__ . '/autoload/bootstrap.php';

/** @var \Interop\Container\ContainerInterface $container */
$container = require 'container.php';

/** @var \Doctrine\ORM\EntityManager $em */
$entityManager = $container->get('doctrine.entitymanager.orm_default');

return ConsoleRunner::createHelperSet($entityManager);
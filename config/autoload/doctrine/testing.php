<?php

use Doctrine\DBAL\Driver\PDOMySql\Driver;

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'params' => [
                    'driverClass' => Driver::class,
                    'host' => 'localhost',
                    'dbname' => 'crafttekk-mod-console',
                    'user' => 'testing',
                    'password' => '1234',
                    'driverOptions' => [
                        1002 => 'SET NAMES utf8mb4'
                    ]
                ],
            ],
        ],
    ],
];
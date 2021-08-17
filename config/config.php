<?php

use Phalcon\Config;

return new Config(
    [
        'database'    => [
            'adapter'  => 'Mysql',
            'host'     => 'localhost',
            'username' => 'root1',
            'password' => 'root1',
            'name'     => 'vokuro',
        ]
    ]
);
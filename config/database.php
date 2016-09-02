<?php

return [

    'fetch' => PDO::FETCH_CLASS,

    'default' => 'openbase',

    'connections' => [

        'openbase' => [
            'driver'    => 'openbase',
            'path'      => 'DSN=/home/hospub/banco/bdint;SEC=33;LEV=atua;',
            'database'  => ''
        ],

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
        ],

    ],

];

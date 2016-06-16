<?php

require_once __DIR__ .'/../lib/bootstrap.php';

$db_conf = [
    'propel' => [
        'database' => [
            'connections' => [
                'main' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\DebugPDO',
                    'dsn'        => 'mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_NAME'),
                    'user'       => getenv('DB_USER'),
                    'password'   => getenv('DB_PASSWORD'),
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'main',
            'connections' => ['main']
        ],
        'generator' => [
            'defaultConnection' => 'main',
            'connections' => ['main'],
//            'schema' => [
//                'autoPackage' => true
//            ]
        ],
        'paths' => [
            'projectDir' => 'database',
            'schemaDir'=> 'database/schema',
            'outputDir' => 'database',
            'phpDir' => 'database/generated-code',
            'phpConfDir' => 'database/generated-conf',
            'sqlDir' => 'database/generated-sql',
            'migrationDir' => 'database/generated-migrations',
        ]
    ]
];

if(!empty(getenv('DB_SOCKET'))){
    $db_conf['propel']['database']['connections']['main']['dsn'] = 'mysql:unix_socket='.getenv('DB_SOCKET').';dbname='.getenv('DB_NAME');
}

return $db_conf;
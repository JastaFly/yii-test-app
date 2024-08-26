<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=pg_db;port=5432;dbname=super_hero_storage',
    'username' => 'batman',
    'password' => 'wayne',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache', pgsql:host=pg_db;port=5432;dbname=super_hero_storage
];

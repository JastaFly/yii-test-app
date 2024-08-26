<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => ['@bower' => '@vendor/bower-asset', '@npm' => '@vendor/npm-asset', '@tests' => '@app/tests'],
    'components' => [
        'cache' => ['class' => 'yii\caching\FileCache'],
        'log' => ['targets' => [['class' => 'yii\log\FileTarget', 'levels' => ['error', 'warning']]]],
        'db' => $db,
    ],
    'params' => $params,
    'modules' => [
        'user-management' => [
            'class' => 'webvimark\modules\UserManagement\UserManagementModule',
            'controllerNamespace' => 'vendor\webvimark\modules\UserManagement\controllers'
        ],
    ],
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = ['class' => 'yii\gii\Module'];
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = ['class' => 'yii\debug\Module'];
}

return $config;

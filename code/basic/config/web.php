<?php

use webvimark\modules\UserManagement\models\UserVisitLog;
use yii\symfonymailer\Mailer;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'layout' => 'employee',
    'name' => 'Test app on Yii',
    'language' => 'ru',
    'defaultRoute' => 'employee/index',
    'aliases' => ['@bower' => '@vendor/bower-asset', '@npm' => '@vendor/npm-asset'],
    'components' => ['formatter' => ['dateFormat' => 'php:d F Y'],
        'request' => ['cookieValidationKey' => 'Kwg0q_OGlm1pmiO5XNYAJCJOZEKeuTpT'],
        'cache' => ['class' => 'yii\caching\FileCache'],
        'user' => ['identityClass' => 'app\models\User', 'enableAutoLogin' => true],
        'errorHandler' => ['errorAction' => 'site/error'],
        'mailer' => ['class' => Mailer::class, 'viewPath' => '@app/mail', 'useFileTransport' => true],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [['class' => 'yii\log\FileTarget', 'levels' => ['error', 'warning']]]
        ],
        'db' => $db,
        'urlManager' => ['enablePrettyUrl' => true, 'showScriptName' => false, 'rules' => []],
        'user' => ['class' => 'webvimark\modules\UserManagement\components\UserConfig',
            'on afterLogin' => function ($event) {
                UserVisitLog::newVisitor($event->identity->id);
            }
        ],
    ],
    'params' => $params,
    'modules' => [
        'user-management' => [
            'class' => 'webvimark\modules\UserManagement\UserManagementModule',
            'on beforeAction' => function (yii\base\ActionEvent $event) {
                if ($event->action->uniqueId == 'user-management/auth/login') {
                    $event->action->controller->layout = 'loginLayout.php';
                };
            },
        ],
    ],
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = ['class' => 'yii\debug\Module'];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = ['class' => 'yii\gii\Module'];
}

return $config;

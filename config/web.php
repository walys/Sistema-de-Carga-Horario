<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'pt_BR',
    'sourceLanguage' => 'pt_BR',
    'timeZone' => 'America/Sao_Paulo',
    'charset' => 'UTF-8',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '1bJsYHLt-OXDGm30Cs54wpFNn89OZR8u',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Usuario',
            'enableAutoLogin' => true,
            'loginUrl' => [ 'site/index' ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules' => [
        'curso' => [
            'class' => 'app\modules\curso\Curso',
        ],
        'nucleo' => [
            'class' => 'app\modules\nucleo\Nucleo',
        ],
        'usuario' => [
            'class' => 'app\modules\usuario\Usuario',
        ],
        'matriz' => [
            'class' => 'app\modules\matriz\Matriz',
        ],
        'oferta' => [
            'class' => 'app\modules\oferta\Oferta',
        ],
        'coordena' => [
            'class' => 'app\modules\coordena\Coordena',
        ],
        'disciplina' => [
            'class' => 'app\modules\disciplina\Disciplina',
        ],
        'detalheoferta' => [
            'class' => 'app\modules\detalheoferta\Detalheoferta',
        ],
        'docente' => [
            'class' => 'app\modules\docente\Docente',
        ],
    ],
    'params' => $params,
    'defaultRoute' => 'site/login',
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

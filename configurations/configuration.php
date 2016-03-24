<?php

/**
 *
 * @author Kolyunya
 */

return [
    'id' => 'wordy',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'market/index',
    'components' => [
        'request' => [
            'enableCookieValidation' => false,
            'enableCsrfCookie' => false,
            'enableCsrfValidation' => false,
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
        'errorHandler' => [
            'class' => 'app\components\ErrorHandler',
        ],
        'requestParser' => [
            'class' => 'app\components\RequestParser',
        ],
        'productProxy' => require(__DIR__ . '/product/proxy.php'),
        'productListener' => require(__DIR__ . '/product/listener.php'),
        'orderProxy' => require(__DIR__ . '/order/proxy.php'),
        'orderListener' => require(__DIR__ . '/order/listener.php'),
        'clientProxy' => require(__DIR__ . '/client/proxy.php'),
        'db' => require(__DIR__ . '/database/database.php'),
    ],
    'params' => require(__DIR__ . '/parameters/parameters.php'),
];

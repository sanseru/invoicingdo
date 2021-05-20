<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'Nama Aplikasi',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'errorAction' => 'site/error',
        ],
        
        /*'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['pattern' => 'Home','route' => 'site/index','suffix' => '.xml',],


                ['pattern' => 'Invoice','route' => 'invoice/index','suffix' => '.xml',],

                ['pattern' => 'masterperusahaan','route' => 'masterperusahaan/index','suffix' => '.xml',],
                ['pattern' => 'masterperusahaanCreate','route' => 'masterperusahaan/create','suffix' => '.xml',],
                ['pattern' => 'masterperusahaanUpdate','route' => 'masterperusahaan/update','suffix' => '.xml',],
                ['pattern' => 'masterperusahaanView','route' => 'masterperusahaan/view','suffix' => '.xml',],

                ['pattern' => 'items','route' => 'items/index','suffix' => '.xml',],
                ['pattern' => 'itemsCreate','route' => 'items/create','suffix' => '.xml',],
                ['pattern' => 'itemsUpdate','route' => 'items/update','suffix' => '.xml',],
                ['pattern' => 'itemsView','route' => 'items/view','suffix' => '.xml',],

            ],
        ], */
        
    ],
    'params' => $params,
];

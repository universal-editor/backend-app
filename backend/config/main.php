<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'rest' => [
            'class' => 'common\modules\rest\Module',
            'modules' => [
                'v1' => [
                    'class' => 'common\modules\rest\v1\Module',
                    'as corsFilter' => [
                        'class' => \yii\filters\Cors::class,
                        'cors' => [
                            'Origin' => ['*'],
                            'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'HEAD', 'INFO'],
                            'Access-Control-Request-Headers' => ['X-Wsse'],
                            'Access-Control-Allow-Credentials' => true,
                            'Access-Control-Max-Age' => 3600,
                            'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'GET rest/v1/news' => 'rest/v1/news/index',
                'POST rest/v1/news' => 'rest/v1/news/create',
                'OPTIONS rest/v1/news' => 'rest/v1/news/options',
                'GET rest/v1/news/<id:\d+>' => 'rest/v1/news/view',
                'PUT,POST rest/v1/news/<id:\d+>' => 'rest/v1/news/update',
                'DELETE rest/v1/news/<id:\d+>' => 'rest/v1/news/delete',
                'OPTIONS rest/v1/news/<id:\d+>' => 'rest/v1/news/options',
                
                'GET rest/v1/news/category' => 'rest/v1/news-category/index',
                'POST rest/v1/news/category' => 'rest/v1/news-category/create',
                'OPTIONS rest/v1/news/category' => 'rest/v1/news-category/options',
                'GET rest/v1/news/category/<id:\d+>' => 'rest/v1/news-category/view',
                'PUT,POST rest/v1/news/category/<id:\d+>' => 'rest/v1/news-category/update',
                'DELETE rest/v1/news/category/<id:\d+>' => 'rest/v1/news-category/delete',
                'OPTIONS rest/v1/news/category/<id:\d+>' => 'rest/v1/news-category/options',
                
                'GET rest/v1/staff' => 'rest/v1/staff/index',
                'POST rest/v1/staff' => 'rest/v1/staff/create',
                'OPTIONS rest/v1/staff' => 'rest/v1/staff/options',
                'GET rest/v1/staff/<id:\d+>' => 'rest/v1/staff/view',
                'PUT,POST rest/v1/staff/<id:\d+>' => 'rest/v1/staff/update',
                'DELETE rest/v1/staff/<id:\d+>' => 'rest/v1/staff/delete',
                'OPTIONS rest/v1/staff/<id:\d+>' => 'rest/v1/staff/options',
                
                'GET rest/v1/country' => 'rest/v1/country/index',
                'POST rest/v1/country' => 'rest/v1/country/create',
                'OPTIONS rest/v1/country' => 'rest/v1/country/options',
                'GET rest/v1/country/<id:\d+>' => 'rest/v1/country/view',
                'PUT,POST rest/v1/country/<id:\d+>' => 'rest/v1/country/update',
                'DELETE rest/v1/country/<id:\d+>' => 'rest/v1/country/delete',
                'OPTIONS rest/v1/country/<id:\d+>' => 'rest/v1/country/options',
            ],
        ],
    ],
    'params' => $params,
];

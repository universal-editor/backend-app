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
                'GET rest/v1/news' => 'rest/v1/news/news/index',
                'POST rest/v1/news' => 'rest/v1/news/news/create',
                'OPTIONS rest/v1/news' => 'rest/v1/news/news/options',
                'GET rest/v1/news/<id:\d+>' => 'rest/v1/news/news/view',
                'PUT,POST rest/v1/news/<id:\d+>' => 'rest/v1/news/news/update',
                'DELETE rest/v1/news/<id:\d+>' => 'rest/v1/news/news/delete',
                'OPTIONS rest/v1/news/<id:\d+>' => 'rest/v1/news/news/options',
                
                'GET rest/v1/news/categories' => 'rest/v1/news/category/index',
                'POST rest/v1/news/categories' => 'rest/v1/news/category/create',
                'OPTIONS rest/v1/news/categories' => 'rest/v1/news/category/options',
                'GET rest/v1/news/categories/<id:\d+>' => 'rest/v1/news/category/view',
                'PUT,POST rest/v1/news/categories/<id:\d+>' => 'rest/v1/news/category/update',
                'DELETE rest/v1/news/categories/<id:\d+>' => 'rest/v1/news/category/delete',
                'OPTIONS rest/v1/news/categories/<id:\d+>' => 'rest/v1/news/category/options',
                
                'GET rest/v1/staff' => 'rest/v1/organization/staff/index',
                'POST rest/v1/staff' => 'rest/v1/organization/staff/create',
                'OPTIONS rest/v1/staff' => 'rest/v1/organization/staff/options',
                'GET rest/v1/staff/<id:\d+>' => 'rest/v1/organization/staff/view',
                'PUT,POST rest/v1/staff/<id:\d+>' => 'rest/v1/organization/staff/update',
                'DELETE rest/v1/staff/<id:\d+>' => 'rest/v1/organization/staff/delete',
                'OPTIONS rest/v1/staff/<id:\d+>' => 'rest/v1/organization/staff/options',
                
                'GET rest/v1/country' => 'rest/v1/country/index',
                'POST rest/v1/country' => 'rest/v1/country/create',
                'OPTIONS rest/v1/country' => 'rest/v1/country/options',
                'GET rest/v1/country/<id:\d+>' => 'rest/v1/country/view',
                'PUT,POST rest/v1/country/<id:\d+>' => 'rest/v1/country/update',
                'DELETE rest/v1/country/<id:\d+>' => 'rest/v1/country/delete',
                'OPTIONS rest/v1/country/<id:\d+>' => 'rest/v1/country/options',
                
                'GET rest/v1/tags' => 'rest/v1/tag/index',
                'POST rest/v1/tags' => 'rest/v1/tag/create',
                'OPTIONS rest/v1/tags' => 'rest/v1/tag/options',
                'GET rest/v1/tags/<id:\d+>' => 'rest/v1/tag/view',
                'PUT,POST rest/v1/tags/<id:\d+>' => 'rest/v1/tag/update',
                'DELETE rest/v1/tags/<id:\d+>' => 'rest/v1/tag/delete',
                'OPTIONS rest/v1/tags/<id:\d+>' => 'rest/v1/tag/options',
            ],
        ],
    ],
    'params' => $params,
];

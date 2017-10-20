<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'language' => 'ru_RU',
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
                            'Access-Control-Request-Method' => [
                                'GET',
                                'POST',
                                'PUT',
                                'DELETE',
                                'HEAD',
                                'INFO',
                                'LOCK',
                                'UNLOCK'
                            ],
                            'Access-Control-Request-Headers' => ['X-Wsse'],
                            'Access-Control-Allow-Credentials' => true,
                            'Access-Control-Max-Age' => 3600,
                            'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                        ],
                    ],
                    'as contentNegotiator' => [
                        'class' => \yii\filters\ContentNegotiator::class,
                        'formats' => [
                            'application/json' => \yii\web\Response::FORMAT_JSON,
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
            'charset' => 'UTF-8',
            'format' => \yii\web\Response::FORMAT_JSON
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'universal-backend',
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
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => [
                        'rest/v1/news' => 'rest/v1/news/news'
                    ],
                    'extraPatterns' => [
                        'LOCK {id}' => 'lock',
                        'UNLOCK {id}' => 'unlock'
                    ]
                ],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => [
                        'rest/v1/news/categories' => 'rest/v1/news/category'
                    ]
                ],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => [
                        'rest/v1/staff' => 'rest/v1/organization/staff'
                    ]
                ],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => [
                        'rest/v1/country' => 'rest/v1/country'
                    ]
                ],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => [
                        'rest/v1/tags' => 'rest/v1/tags'
                    ]
                ]
            ]
        ]
    ],
    'params' => $params,
];

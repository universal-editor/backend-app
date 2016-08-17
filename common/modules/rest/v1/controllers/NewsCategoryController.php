<?php

namespace common\modules\rest\v1\controllers;

use common\modules\rest\v1\models\NewsCategory;
use yii\rest\ActiveController;
use yii\rest\Serializer;

/**
 * News category controller.
 */
class NewsCategoryController extends ActiveController
{
    public $modelClass = NewsCategory::class;

    public $serializer = [
        'class' => Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        return [];
    }
}

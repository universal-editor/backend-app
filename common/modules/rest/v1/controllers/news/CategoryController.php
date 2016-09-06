<?php

namespace common\modules\rest\v1\controllers\news;

use common\modules\rest\v1\models\news\Category;
use yii\rest\ActiveController;
use yii\rest\Serializer;

/**
 * News category controller.
 */
class CategoryController extends ActiveController
{
    public $modelClass = Category::class;

    public $serializer = [
        'class' => Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        return [];
    }
}

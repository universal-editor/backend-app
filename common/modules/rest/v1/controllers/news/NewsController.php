<?php

namespace common\modules\rest\v1\controllers\news;

use common\modules\rest\v1\models\news\News;
use yii\rest\ActiveController;
use yii\rest\Serializer;

/**
 * News controller.
 */
class NewsController extends ActiveController
{
    public $modelClass = News::class;

    public $serializer = [
        'class' => Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }
}

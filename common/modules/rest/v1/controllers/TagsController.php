<?php

namespace common\modules\rest\v1\controllers;

use common\modules\rest\v1\models\Tag;
use yii\rest\ActiveController;
use yii\rest\Serializer;

/**
 * Tags controller.
 */
class TagsController extends ActiveController
{
    public $modelClass = Tag::class;

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

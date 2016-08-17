<?php

namespace common\modules\rest\v1\controllers;

use common\modules\rest\v1\models\Country;
use yii\rest\ActiveController;
use yii\rest\Serializer;

/**
 * Country controller.
 */
class CountryController extends ActiveController
{
    public $modelClass = Country::class;

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

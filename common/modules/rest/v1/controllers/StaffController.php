<?php

namespace common\modules\rest\v1\controllers;

use common\modules\rest\v1\models\Staff;
use yii\rest\ActiveController;
use yii\rest\Serializer;

/**
 * Staff controller.
 */
class StaffController extends ActiveController
{
    public $modelClass = Staff::class;

    public $serializer = [
        'class' => Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        return [];
    }
}

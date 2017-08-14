<?php

namespace common\modules\rest\v1\controllers\news;

use common\modules\rest\v1\controllers\news\actions\LockAction;
use common\modules\rest\v1\controllers\news\actions\UnlockAction;
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

    public function actions()
    {
        $action = parent::actions();

        $action['lock'] = [
            'class'      => LockAction::class,
            'modelClass' => $this->modelClass,
            'locked'     => [3, 4]
        ];

        $action['unlock'] = [
            'class'      => UnlockAction::class,
            'modelClass' => $this->modelClass,
            'locked'     => [3, 4]
        ];

        return $action;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }
}

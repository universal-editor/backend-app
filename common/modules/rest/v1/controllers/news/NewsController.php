<?php

namespace common\modules\rest\v1\controllers\news;

use common\modules\rest\v1\controllers\news\actions\LockAction;
use common\modules\rest\v1\controllers\news\actions\UnlockAction;
use common\modules\rest\v1\models\news\News;
use yii\rest\ActiveController;
use yii\rest\Serializer;
use yii\web\HttpException;

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
        $actions = parent::actions();
        
        $actions['delete']['checkAccess'] = function ($action, $model) {
            if (in_array($model->id, [3, 4])) {
                throw new HttpException(
                    LockAction::HTTP_LOCKED,
                    sprintf('Entity "%d" is already locked.', $model->id)
                );
            }
        };

        $actions['lock'] = [
            'class' => LockAction::class,
            'modelClass' => $this->modelClass,
            'locked' => [3, 4]
        ];

        $actions['unlock'] = [
            'class' => UnlockAction::class,
            'modelClass' => $this->modelClass,
            'locked' => [3, 4]
        ];

        return $actions;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }
}

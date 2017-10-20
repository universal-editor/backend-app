<?php

namespace common\modules\rest\v1\controllers\news\actions;

use yii\db\ActiveRecord;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class UnlockAction extends \yii\rest\UpdateAction
{
    /**
     * HTTP status for locked resource.
     */
    const HTTP_LOCKED = 423;
    /**
     * Status for unlock.
     */
    const STATUS = 'unlocked';

    /**
     * @var array Locked Id`s.
     */
    public $locked = [];

    /**
     * @inheritdoc
     *
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function run($id)
    {
        /* @var ActiveRecord $model */
        $model = $this->findModel($id);

        if (in_array($id, $this->locked)) {
            throw new HttpException(
                self::HTTP_LOCKED,
                sprintf('Entity "%d" is locked. You can`t unlock it.', $id)
            );
        }

        \Yii::$app->getResponse()->setStatusCode(204);
    }
}
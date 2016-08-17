<?php

namespace common\modules\rest\v1\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Staff model.
 */
class Staff extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => \Yii::t('app', 'Name'),
            'email' => \Yii::t('app', 'E-mail'),
            'created_at' => \Yii::t('app', 'Created date'),
            'updated_at' => \Yii::t('app', 'Updated date'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
        ];
    }
}

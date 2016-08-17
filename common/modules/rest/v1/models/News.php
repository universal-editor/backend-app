<?php

namespace common\modules\rest\v1\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * News model.
 */
class News extends ActiveRecord
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
            'title' => \Yii::t('app', 'Title'),
            'description' => \Yii::t('app', 'Description'),
            'text' => \Yii::t('app', 'Text'),
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
            [['title', 'description', 'text'], 'safe'],
            [['title', 'description'], 'required'],
        ];
    }
}

<?php

namespace common\modules\rest\v1\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * News category model.
 */
class NewsCategory extends ActiveRecord
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
            [['parent_id', 'title', 'description'], 'safe'],
            [['title'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraFields()
    {
        return ['child_count'];
    }

    /**
     * Gets number of child categories.
     * 
     * @return int
     */
    public function getChild_count()
    {
        return (int) $this->hasMany(static::class, ['parent_id' => 'id'])->count();
    }
}

<?php

namespace common\modules\rest\v1\models\organization;

use notamedia\relation\RelationBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Staff model.
 */
class Staff extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%organization_staff}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class
            ],
            [
                'class' => RelationBehavior::class,
                'relationalFields' => ['colors']
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
            'parent_id' => \Yii::t('app', 'Head'),
            'gender' => \Yii::t('app', 'Gender'),
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
            [['name', 'email', 'parent_id', 'colors'], 'safe'],
            [['name', 'email'], 'required'],
            ['name', 'string', 'length' => [2, 255]],
            ['email', 'email'],
        ];
    }
    
    public function extraFields()
    {
        return ['colors'];
    }

    public function getColors()
    {
        return $this->hasMany(StaffColor::class, ['staff_id' => 'id']);
    }
}

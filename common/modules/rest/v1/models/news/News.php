<?php

namespace common\modules\rest\v1\models\news;

use common\modules\rest\v1\models\Tag;
use notamedia\relation\RelationBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * News model.
 */
class News extends ActiveRecord
{
    public static function tableName()
    {
        return 'news';
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
                'relations' => ['authors', 'tags']
            ]
        ];
    }

    public function transactions()
    {
        return [
            $this->getScenario() => static::OP_ALL
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app', 'ID'),
            'title' => \Yii::t('app', 'Title'),
            'description' => \Yii::t('app', 'Description'),
            'text' => \Yii::t('app', 'Text'),
            'created_at' => \Yii::t('app', 'Created date'),
            'updated_at' => \Yii::t('app', 'Updated date'),
        ];
    }
    
    public function extraFields()
    {
        return ['authors', 'tags'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'text', 'category_id', 'authors', 'tags'], 'safe'],
            [['title', 'description'], 'required'],
        ];
    }
            
    public function getAuthors()
    {
        return $this->hasMany(NewsHasAuthor::class, ['news_id' => 'id'])
            ->joinWith('staff');
    }
            
    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->via('hasTags');
    }
    
    public function getHasTags()
    {
        return $this->hasMany(NewsHasTag::class, ['news_id' => 'id']);
    }
}

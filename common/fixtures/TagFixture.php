<?php

namespace common\fixtures;

use common\modules\rest\v1\models\Tag;
use yii\test\ActiveFixture;

class TagFixture extends ActiveFixture
{
    public $modelClass = Tag::class;
}
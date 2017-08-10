<?php

namespace common\fixtures;

use common\modules\rest\v1\models\news\News;
use yii\test\ActiveFixture;

class NewsFixture extends ActiveFixture
{
    public $modelClass = News::class;
}
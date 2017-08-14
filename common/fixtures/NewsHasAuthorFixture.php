<?php

namespace common\fixtures;

use common\modules\rest\v1\models\news\NewsHasAuthor;
use yii\test\ActiveFixture;

class NewsHasAuthorFixture extends ActiveFixture
{
    public $modelClass = NewsHasAuthor::class;
}
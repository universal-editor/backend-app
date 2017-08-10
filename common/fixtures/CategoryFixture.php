<?php

namespace common\fixtures;

use common\modules\rest\v1\models\news\Category;
use yii\test\ActiveFixture;

class CategoryFixture extends ActiveFixture
{
    public $modelClass = Category::class;
}
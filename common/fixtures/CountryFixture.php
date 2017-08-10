<?php

namespace common\fixtures;

use common\modules\rest\v1\models\Country;
use yii\test\ActiveFixture;

class CountryFixture extends ActiveFixture
{
    public $modelClass = Country::class;
}
<?php

namespace common\modules\rest\v1\models\news;

use common\modules\rest\v1\models\organization\Staff;
use yii\db\ActiveRecord;

/**
 * News authors model.
 */
class NewsHasAuthor extends ActiveRecord
{
    public function fields()
    {
        return ['staff_id', 'staff'];
    }
    
    public function getStaff()
    {
        return $this->hasMany(Staff::class, ['id' => 'staff_id']);
    }
}

<?php

namespace common\modules\rest\v1\models\organization;

use yii\db\ActiveRecord;

/**
 * Staff colors model.
 */
class StaffColor extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%organization_staff_color}}';
    }
    
    public function fields()
    {
        return ['color'];
    }
}

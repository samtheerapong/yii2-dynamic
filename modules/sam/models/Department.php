<?php

namespace app\modules\sam\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $department_id
 * @property string|null $department_name หน่วยงาน
 * @property string|null $details รายละเอียด
 * @property string|null $color สี
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['details'], 'string'],
            [['department_name'], 'string', 'max' => 200],
            [['color'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'department_id' => Yii::t('app', 'Department ID'),
            'department_name' => Yii::t('app', 'หน่วยงาน'),
            'details' => Yii::t('app', 'รายละเอียด'),
            'color' => Yii::t('app', 'สี'),
        ];
    }
}

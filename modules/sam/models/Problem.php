<?php

namespace app\modules\sam\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property int $problem_id
 * @property string|null $name กระบวนการที่พบปัญหา
 * @property string|null $details รายละเอียด
 * @property string|null $color สี
 */
class Problem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['details'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['color'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'problem_id' => Yii::t('app', 'Problem ID'),
            'name' => Yii::t('app', 'กระบวนการที่พบปัญหา'),
            'details' => Yii::t('app', 'รายละเอียด'),
            'color' => Yii::t('app', 'สี'),
        ];
    }
}

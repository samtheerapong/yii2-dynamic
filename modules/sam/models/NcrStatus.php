<?php

namespace app\modules\sam\models;

use Yii;

/**
 * This is the model class for table "ncr_status".
 *
 * @property int $id
 * @property string|null $status_name สถานะ
 * @property string|null $details รายละเอียด
 * @property string|null $color สี
 */
class NcrStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ncr_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['details'], 'string'],
            [['status_name'], 'string', 'max' => 200],
            [['color'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status_name' => Yii::t('app', 'สถานะ'),
            'details' => Yii::t('app', 'รายละเอียด'),
            'color' => Yii::t('app', 'สี'),
        ];
    }
}

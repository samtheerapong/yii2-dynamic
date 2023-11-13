<?php

namespace app\modules\sam\models;

use Yii;

/**
 * This is the model class for table "ticket_catagory".
 *
 * @property int $catagory_id
 * @property string|null $name ชื่อ
 * @property string|null $details รายละเอียด
 * @property string|null $color สี
 */
class TicketCatagory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket_catagory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['details'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['color'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'catagory_id' => Yii::t('app', 'Catagory ID'),
            'name' => Yii::t('app', 'ชื่อ'),
            'details' => Yii::t('app', 'รายละเอียด'),
            'color' => Yii::t('app', 'สี'),
        ];
    }
}

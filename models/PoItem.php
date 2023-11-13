<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "po_item".
 *
 * @property int $id
 * @property string|null $po_item_no
 * @property float|null $quantity
 * @property int|null $po_id
 *
 * @property Po $po
 */
class PoItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'po_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity'], 'number'],
            [['po_id'], 'integer'],
            [['po_item_no'], 'string', 'max' => 45],
            [['po_id'], 'exist', 'skipOnError' => true, 'targetClass' => Po::class, 'targetAttribute' => ['po_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'po_item_no' => Yii::t('app', 'Po Item No'),
            'quantity' => Yii::t('app', 'Quantity'),
            'po_id' => Yii::t('app', 'Po ID'),
        ];
    }

    /**
     * Gets query for [[Po]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPo()
    {
        return $this->hasOne(Po::class, ['id' => 'po_id']);
    }
}

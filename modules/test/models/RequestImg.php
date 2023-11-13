<?php

namespace app\modules\test\models;

use Yii;

/**
 * This is the model class for table "request_img".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $requester_id
 *
 * @property Requester $requester
 */
class RequestImg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['requester_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['requester_id'], 'exist', 'skipOnError' => true, 'targetClass' => Requester::class, 'targetAttribute' => ['requester_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'requester_id' => Yii::t('app', 'Requester ID'),
        ];
    }

    /**
     * Gets query for [[Requester]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequester()
    {
        return $this->hasOne(Requester::class, ['id' => 'requester_id']);
    }
}

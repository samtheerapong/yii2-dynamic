<?php

namespace app\modules\test\models;

use Yii;

/**
 * This is the model class for table "requester".
 *
 * @property int $id
 * @property string|null $number
 * @property string|null $created_at
 *
 * @property RequestImg[] $requestImgs
 * @property RequesterProblem[] $requesterProblems
 */
class Requester extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requester';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'created_at'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'number' => Yii::t('app', 'เลขที่'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
        ];
    }

    /**
     * Gets query for [[RequestImgs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestImgs()
    {
        return $this->hasMany(RequestImg::class, ['requester_id' => 'id']);
    }

    /**
     * Gets query for [[RequesterProblems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequesterProblems()
    {
        return $this->hasMany(RequesterProblem::class, ['requester_id' => 'id']);
    }
}

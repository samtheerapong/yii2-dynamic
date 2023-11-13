<?php

namespace app\modules\test\models;

use Yii;

/**
 * This is the model class for table "requester_problem".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $problem_id
 * @property int|null $requester_id
 *
 * @property Problem $problem
 * @property Requester $requester
 */
class RequesterProblem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requester_problem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['problem_id', 'requester_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['problem_id'], 'exist', 'skipOnError' => true, 'targetClass' => Problem::class, 'targetAttribute' => ['problem_id' => 'id']],
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
            'problem_id' => Yii::t('app', 'Problem ID'),
            'requester_id' => Yii::t('app', 'Requester ID'),
        ];
    }

    /**
     * Gets query for [[Problem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProblem()
    {
        return $this->hasOne(Problem::class, ['id' => 'problem_id']);
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

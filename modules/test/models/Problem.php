<?php

namespace app\modules\test\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property int $id
 * @property string|null $problem
 * @property string|null $color
 *
 * @property RequesterProblem[] $requesterProblems
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
            [['problem', 'color'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'problem' => Yii::t('app', 'Problem'),
            'color' => Yii::t('app', 'Color'),
        ];
    }

    /**
     * Gets query for [[RequesterProblems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequesterProblems()
    {
        return $this->hasMany(RequesterProblem::class, ['problem_id' => 'id']);
    }
}

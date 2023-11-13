<?php

namespace app\modules\sam\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sam\models\Ncr;

class NcrSearch extends Ncr
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [
                [
                    'ref',
                    'event_name',
                    'detail',
                    'start_date',
                    'end_date',
                    'location',
                    'customer_name',
                    'customer_mobile_phone',
                    'to_department',
                    'created_at',
                    'problem',
                    'from_department',
                    'product_name',
                    'status'
                ],
                'safe'
            ],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Ncr::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            // เรียงล่าสุดก่อน จาก id
            'sort'=> ['defaultOrder' => [
                'id'=> 'DESC'
                ]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            // 'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'problem', $this->problem])
            ->andFilterWhere(['like', 'to_department', $this->to_department])
            ->andFilterWhere(['like', 'from_department', $this->from_department])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'customer_mobile_phone', $this->customer_mobile_phone]);

        return $dataProvider;
    }
}

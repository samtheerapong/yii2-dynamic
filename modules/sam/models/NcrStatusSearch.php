<?php

namespace app\modules\sam\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sam\models\NcrStatus;

/**
 * NcrStatusSearch represents the model behind the search form of `app\modules\sam\models\NcrStatus`.
 */
class NcrStatusSearch extends NcrStatus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['status_name', 'details', 'color'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = NcrStatus::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'status_name', $this->status_name])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'color', $this->color]);

        return $dataProvider;
    }
}

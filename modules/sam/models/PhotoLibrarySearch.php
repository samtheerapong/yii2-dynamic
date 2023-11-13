<?php

namespace app\modules\sam\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sam\models\PhotoLibrary;

class PhotoLibrarySearch extends PhotoLibrary
{
   
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['ref', 'event_name', 'detail', 'start_date', 'end_date', 'location', 'customer_name', 'customer_mobile_phone'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PhotoLibrary::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $query->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_mobile_phone', $this->customer_mobile_phone]);

        return $dataProvider;
    }
}

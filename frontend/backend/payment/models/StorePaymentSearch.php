<?php

namespace frontend\backend\payment\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\backend\payment\models\StorePayment;

/**
 * StorePaymentSearch represents the model behind the search form of `frontend\backend\payment\models\StorePayment`.
 */
class StorePaymentSearch extends StorePayment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'STATUS', 'STORE_STATUS', 'FAKTURE_TEMPO', 'PAY_DURATION_ACTIVE', 'PAY_DURATION_BONUS'], 'integer'],
            [['CREATE_BY', 'CREATE_AT', 'UPDATE_BY', 'UPDATE_AT', 'ACCESS_UNIX', 'OUTLET_CODE', 'OUTLET_NM', 'FAKTURE', 'FAKTURE_DATE', 'PAY_PAKAGE', 'PAY_DATE'], 'safe'],
            [['PAY_TOTAL'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = StorePayment::find();

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
            'ID' => $this->ID,
            'CREATE_AT' => $this->CREATE_AT,
            'UPDATE_AT' => $this->UPDATE_AT,
            'STATUS' => $this->STATUS,
            'STORE_STATUS' => $this->STORE_STATUS,
            'FAKTURE_DATE' => $this->FAKTURE_DATE,
            'FAKTURE_TEMPO' => $this->FAKTURE_TEMPO,
            'PAY_PAKAGE' => $this->PAY_PAKAGE,
            'PAY_DATE' => $this->PAY_DATE,
            'PAY_DURATION_ACTIVE' => $this->PAY_DURATION_ACTIVE,
            'PAY_DURATION_BONUS' => $this->PAY_DURATION_BONUS,
            'PAY_TOTAL' => $this->PAY_TOTAL,
        ]);

        $query->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY])
            ->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY])
            ->andFilterWhere(['like', 'ACCESS_UNIX', $this->ACCESS_UNIX])
            ->andFilterWhere(['like', 'OUTLET_CODE', $this->OUTLET_CODE])
            ->andFilterWhere(['like', 'OUTLET_NM', $this->OUTLET_NM])
            ->andFilterWhere(['like', 'FAKTURE', $this->FAKTURE]);

        return $dataProvider;
    }
}

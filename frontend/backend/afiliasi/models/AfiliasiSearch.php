<?php

namespace frontend\backend\afiliasi\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\backend\afiliasi\models\Afiliasi;

/**
 * AfiliasiSearch represents the model behind the search form of `frontend\backend\afiliasi\models\Afiliasi`.
 */
class AfiliasiSearch extends Afiliasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'STATUS', 'PAKAGE_DURATION'], 'integer'],
            [['CREATE_BY', 'CREATE_AT', 'UPDATE_BY', 'UPDATE_AT', 'ACCESS_UNIX', 'AFILIASI_KODE', 'AFILIASI_URL', 'PAKAGE', 'PAKAGE_NM'], 'safe'],
            [['PAKAGE_PRICE'], 'number'],
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
        $query = Afiliasi::find();

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
            'PAKAGE_DURATION' => $this->PAKAGE_DURATION,
            'PAKAGE_PRICE' => $this->PAKAGE_PRICE,
        ]);

        $query->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY])
            ->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY])
            ->andFilterWhere(['like', 'ACCESS_UNIX', $this->ACCESS_UNIX])
            ->andFilterWhere(['like', 'AFILIASI_KODE', $this->AFILIASI_KODE])
            ->andFilterWhere(['like', 'AFILIASI_URL', $this->AFILIASI_URL])
            ->andFilterWhere(['like', 'PAKAGE', $this->PAKAGE])
            ->andFilterWhere(['like', 'PAKAGE_NM', $this->PAKAGE_NM]);

        return $dataProvider;
    }
}

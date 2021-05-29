<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BisnisPartner;

/**
 * BisnisPartnerSearch represents the model behind the search form of `frontend\models\BisnisPartner`.
 */
class BisnisPartnerSearch extends BisnisPartner
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['CardName', 'alamat', 'attention', 'createdDate', 'createdBy'], 'safe'],
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
        $query = BisnisPartner::find();

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
            'createdDate' => $this->createdDate,
        ]);

        $query->andFilterWhere(['like', 'CardName', $this->CardName])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'attention', $this->attention])
            ->andFilterWhere(['like', 'createdBy', $this->createdBy]);

        return $dataProvider;
    }
}

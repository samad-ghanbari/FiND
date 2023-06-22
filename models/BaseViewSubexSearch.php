<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BaseViewSubex;

/**
 * BaseViewSubexSearch represents the model behind the search form of `app\models\BaseViewSubex`.
 */
class BaseViewSubexSearch extends BaseViewSubex
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'province_id', 'district_id', 'center_id'], 'integer'],
            [['province', 'district', 'center_abbr', 'center_name', 'name', 'abbr', 'latitude', 'longitude', 'address'], 'safe'],
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
        $query = BaseViewSubex::find();

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
            'province_id' => $this->province_id,
            'district_id' => $this->district_id,
            'center_id' => $this->center_id,
        ]);

        $query->andFilterWhere(['ilike', 'province', $this->province])
            ->andFilterWhere(['ilike', 'district', $this->district])
            ->andFilterWhere(['ilike', 'center_abbr', $this->center_abbr])
            ->andFilterWhere(['ilike', 'center_name', $this->center_name])
            ->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'abbr', $this->abbr])
            ->andFilterWhere(['ilike', 'latitude', $this->latitude])
            ->andFilterWhere(['ilike', 'longitude', $this->longitude])
            ->andFilterWhere(['ilike', 'address', $this->address]);

        return $dataProvider;
    }
}

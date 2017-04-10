<?php

namespace backend\modules\custom_fields\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\custom_fields\models\CustomFields;

/**
 * CustomFieldsSearch represents the model behind the search form about `backend\modules\custom_fields\models\CustomFields`.
 */
class CustomFieldsSearch extends CustomFields
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_main'], 'integer'],
            [['label', 'slug', 'type', 'valid', 'default_value', 'placeholder'], 'safe'],
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
        $query = CustomFields::find();

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
            'is_main' => $this->is_main,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'valid', $this->valid])
            ->andFilterWhere(['like', 'default_value', $this->default_value])
            ->andFilterWhere(['like', 'placeholder', $this->placeholder]);

        return $dataProvider;
    }
}

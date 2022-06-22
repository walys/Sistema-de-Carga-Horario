<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Matriz;

/**
 * MatrizSearch represents the model behind the search form of `app\models\Matriz`.
 */
class MatrizSearch extends Matriz
{
    /**
     * {@inheritdoc}
     */

    public function attributes(){
        return array_merge(parent::attributes(), ['curso.nome']);
    }

    public function rules()
    {
        return [
            [['id', 'ch_total'], 'integer'],
            [['sigla', 'curso.nome', 'create_at', 'update_at'], 'safe'],
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
        $query = Matriz::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith('curso');
        $dataProvider->sort->attributes['curso.nome'] = [
            'asc' => ['curso.nome' => SORT_ASC],
            'desc' => ['curso.nome' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'curso_id' => $this->curso_id,
            'ch_total' => $this->ch_total,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'sigla', $this->sigla]);
        $query->andFilterWhere(['like', 'curso.nome', $this->getAttribute('curso.nome')]);

        return $dataProvider;
    }
}

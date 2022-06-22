<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Oferta;

/**
 * OfertaSearch represents the model behind the search form of `app\models\Oferta`.
 */
class OfertaSearch extends Oferta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'matriz_id', 'usuario_id'], 'integer'],
            [['semestre_ano_inicio', 'data_registro', 'create_at', 'update_at'], 'safe'],
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
        $query = Oferta::find();

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
            'matriz_id' => $this->matriz_id,
            'usuario_id' => $this->usuario_id,
            'data_registro' => $this->data_registro,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'semestre_ano_inicio', $this->semestre_ano_inicio]);

        return $dataProvider;
    }
}

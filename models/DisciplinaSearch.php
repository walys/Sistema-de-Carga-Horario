<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Disciplina;

/**
 * DisciplinaSearch represents the model behind the search form of `app\models\Disciplina`.
 */
class DisciplinaSearch extends Disciplina
{
    /**
     * {@inheritdoc}
     */

    public function attributes(){
        return array_merge(parent::attributes(), ['nucleo.nome', 'matriz.sigla']);
    }

    public function rules()
    {
        return [
            [['id', 'ch', 'periodo'], 'integer'],
            [['nome', 'create_at', 'update_at', 'matriz.sigla', 'nucleo.nome'], 'safe'],
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
        $query = Disciplina::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith('nucleo');
        $dataProvider->sort->attributes['nucleo.nome'] = [
            'asc' => ['nucleo.sigla' => SORT_ASC],
            'desc' => ['nucleo.sigla' => SORT_DESC],
        ];

        $query->joinWith('matriz');
        $dataProvider->sort->attributes['matriz.sigla'] = [
            'asc' => ['matriz.sigla' => SORT_ASC],
            'desc' => ['matriz.sigla' => SORT_DESC],
        ];

        $query->joinWith('nucleo');

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'nucleo_id' => $this->nucleo_id,
            'matriz_id' => $this->matriz_id,
            'ch' => $this->ch,
            'periodo' => $this->periodo,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'disciplina.nome', $this->nome]);
        $query->andFilterWhere(['like', 'nucleo.nome', $this->getAttribute('nucleo.nome')]);
        $query->andFilterWhere(['like', 'matriz.sigla', $this->getAttribute('matriz.sigla')]);

        return $dataProvider;
    }
}

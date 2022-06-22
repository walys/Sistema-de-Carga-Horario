<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $id
 * @property string $nome
 * @property int|null $ch_total
 * @property int|null $q_periodo
 * @property string|null $sigla
 * @property string|null $create_at
 * @property string|null $update_at
 *
 * @property Coordena[] $coordenas
 * @property Matriz[] $matrizs
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'ch_total', 'sigla', 'ch_total', 'q_periodo'], 'required', 'message' => 'Campo obrigatorio!'],
            [['ch_total', 'q_periodo'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['nome'], 'string', 'max' => 255],
            [['sigla'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'ch_total' => 'Carga Horaia Total',
            'q_periodo' => 'Q Periodo',
            'sigla' => 'Sigla',
            'create_at' => 'Data Criação',
            'update_at' => 'Data Alteração',
        ];
    }

    /**
     * Gets query for [[Coordenas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoordenas()
    {
        return $this->hasMany(Coordena::className(), ['curso_id' => 'id']);
    }

    /**
     * Gets query for [[Matrizs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatrizs()
    {
        return $this->hasMany(Matriz::className(), ['curso_id' => 'id']);
    }
}

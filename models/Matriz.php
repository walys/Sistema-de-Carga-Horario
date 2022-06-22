<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matriz".
 *
 * @property int $id
 * @property int|null $curso_id
 * @property int|null $ch_total
 * @property string|null $sigla
 * @property string|null $create_at
 * @property string|null $update_at
 *
 * @property Curso $curso
 * @property Disciplina[] $disciplinas
 * @property Oferta[] $ofertas
 */
class Matriz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matriz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['curso_id', 'ch_total'], 'integer'],
            [['curso_id', 'ch_total', 'sigla'], 'required', 'message' => 'Campo obrigatorio!'],
            [['create_at', 'update_at'], 'safe'],
            [['sigla'], 'string', 'max' => 10],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['curso_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'curso_id' => 'Curso',
            'ch_total' => 'Carga Horaria Total',
            'sigla' => 'Sigla',
            'create_at' => 'Data Criação',
            'update_at' => 'Data Alteração',
        ];
    }

    /**
     * Gets query for [[Curso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'curso_id']);
    }

    /**
     * Gets query for [[Disciplinas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinas()
    {
        return $this->hasMany(Disciplina::className(), ['matriz_id' => 'id']);
    }

    /**
     * Gets query for [[Ofertas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOfertas()
    {
        return $this->hasMany(Oferta::className(), ['matriz_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalheoferta".
 *
 * @property int $id
 * @property string $semestre_ano
 * @property int|null $disciplina_id
 * @property int|null $oferta_id
 * @property string|null $create_at
 * @property string|null $update_at
 *
 * @property Disciplina $disciplina
 * @property Oferta $oferta
 */
class Detalheoferta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalheoferta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['semestre_ano', 'disciplina_id', 'oferta_id'], 'required', 'message' => 'Campo obrigatorio!'],
            [['disciplina_id', 'oferta_id'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['semestre_ano'], 'string', 'max' => 6],
            [['disciplina_id'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['disciplina_id' => 'id']],
            [['oferta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Oferta::className(), 'targetAttribute' => ['oferta_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'semestre_ano' => 'Semestre Ano',
            'disciplina_id' => 'Disciplina',
            'oferta_id' => 'Oferta',
            'create_at' => 'Data Criação',
            'update_at' => 'Data Alteração',
        ];
    }

    /**
     * Gets query for [[Disciplina]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id' => 'disciplina_id']);
    }

    /**
     * Gets query for [[Oferta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOferta()
    {
        return $this->hasOne(Oferta::className(), ['id' => 'oferta_id']);
    }
}

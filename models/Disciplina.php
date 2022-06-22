<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplina".
 *
 * @property int $id
 * @property int|null $nucleo_id
 * @property int|null $matriz_id
 * @property string $nome
 * @property int $ch
 * @property int $periodo
 * @property string|null $create_at
 * @property string|null $update_at
 *
 * @property Detalheoferta[] $detalheofertas
 * @property Matriz $matriz
 * @property Nucleo $nucleo
 */
class Disciplina extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplina';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nucleo_id', 'matriz_id', 'ch', 'periodo'], 'integer'],
            [['nome', 'ch', 'periodo', 'ch', 'nucleo_id'], 'required', 'message' => 'Campo obrigatorio!'],
            [['create_at', 'update_at'], 'safe'],
            [['nome'], 'string', 'max' => 255],
            [['matriz_id'], 'exist', 'skipOnError' => true, 'targetClass' => Matriz::className(), 'targetAttribute' => ['matriz_id' => 'id']],
            [['nucleo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nucleo::className(), 'targetAttribute' => ['nucleo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nucleo_id' => 'Nucleo',
            'matriz_id' => 'Matriz',
            'nome' => 'Nome',
            'ch' => 'Carga horaria',
            'periodo' => 'Periodo',
            'create_at' => 'Data Criação',
            'update_at' => 'Data Alteração',
        ];
    }

    /**
     * Gets query for [[Detalheofertas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalheofertas()
    {
        return $this->hasMany(Detalheoferta::className(), ['disciplina_id' => 'id']);
    }

    /**
     * Gets query for [[Matriz]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatriz()
    {
        return $this->hasOne(Matriz::className(), ['id' => 'matriz_id']);
    }

    /**
     * Gets query for [[Nucleo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNucleo()
    {
        return $this->hasOne(Nucleo::className(), ['id' => 'nucleo_id']);
    }
}

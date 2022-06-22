<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oferta".
 *
 * @property int $id
 * @property int $matriz_id
 * @property int $usuario_id
 * @property string $semestre_ano_inicio
 * @property string|null $data_registro
 * @property string|null $create_at
 * @property string|null $update_at
 *
 * @property Detalheoferta[] $detalheofertas
 * @property Matriz $matriz
 * @property Usuario $usuario
 */
class Oferta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oferta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matriz_id', 'usuario_id', 'semestre_ano_inicio', 'data_registro'], 'required', 'message' => 'Campo obrigatorio!'],
            [['matriz_id', 'usuario_id'], 'integer'],
            [['data_registro', 'create_at', 'update_at'], 'safe'],
            [['semestre_ano_inicio'], 'string', 'max' => 6],
            [['matriz_id'], 'exist', 'skipOnError' => true, 'targetClass' => Matriz::className(), 'targetAttribute' => ['matriz_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'matriz_id' => 'Matriz',
            'usuario_id' => 'Usuario',
            'semestre_ano_inicio' => 'Semestre Ano Inicio',
            'data_registro' => 'Data Registro',
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
        return $this->hasMany(Detalheoferta::className(), ['oferta_id' => 'id']);
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
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }
}

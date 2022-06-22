<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coordena".
 *
 * @property int $id
 * @property int|null $usuario_id
 * @property int|null $curso_id
 * @property string|null $inicio
 * @property string|null $fim
 * @property string|null $create_at
 * @property string|null $update_at
 *
 * @property Curso $curso
 * @property Usuario $usuario
 */
class Coordena extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coordena';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'curso_id'], 'integer'],
            [['usuario_id', 'curso_id', 'inicio', 'fim'], 'required', 'message' => 'Campo obrigatorio!'],
            [['inicio', 'fim', 'create_at', 'update_at'], 'safe'],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['curso_id' => 'id']],
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
            'usuario_id' => 'Usuario',
            'curso_id' => 'Curso',
            'inicio' => 'Inicio',
            'fim' => 'Fim',
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
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }
}

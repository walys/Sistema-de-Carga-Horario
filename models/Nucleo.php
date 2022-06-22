<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nucleo".
 *
 * @property int $id
 * @property string $nome
 * @property string|null $create_at
 * @property string|null $update_at
 *
 * @property Disciplina[] $disciplinas
 * @property Docente[] $docentes
 * @property Usuario[] $usuarios
 */
class Nucleo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nucleo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required', 'message' => 'Campo obrigatorio!'],
            [['create_at', 'update_at'], 'safe'],
            [['nome'], 'string', 'max' => 255],
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
            'create_at' => 'Data Criação',
            'update_at' => 'Data Alteração',
        ];
    }

    /**
     * Gets query for [[Disciplinas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinas()
    {
        return $this->hasMany(Disciplina::className(), ['nucleo_id' => 'id']);
    }

    /**
     * Gets query for [[Docentes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocentes()
    {
        return $this->hasMany(Docente::className(), ['nucleo_id' => 'id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['nucleo_id' => 'id']);
    }
}

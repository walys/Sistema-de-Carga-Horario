<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "docente".
 *
 * @property int $id
 * @property string $nome
 * @property int|null $nucleo_id
 * @property string|null $create_at
 * @property string|null $update_at
 *
 * @property Nucleo $nucleo
 */
class Docente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'docente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'nucleo_id'], 'required', 'message' => 'Campo obrigatorio!'],
            [['nucleo_id'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['nome'], 'string', 'max' => 255],
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
            'nome' => 'Nome',
            'nucleo_id' => 'Nucleo',
            'create_at' => 'Data Criação',
            'update_at' => 'Data Alteração',
        ];
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

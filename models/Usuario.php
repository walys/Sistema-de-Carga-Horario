<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property int|null $nucleo_id
 * @property string $nome
 * @property string|null $login
 * @property string|null $senha
 * @property string|null $create_at
 * @property string|null $update_at
 *
 * @property Coordena[] $coordenas
 * @property Nucleo $nucleo
 * @property Oferta[] $ofertas
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nucleo_id'], 'integer'],
            [['nome', 'login', 'senha', 'nucleo_id'], 'required', 'message' => 'Campo obrigatorio!'],
            [['create_at', 'update_at'], 'safe'],
            [['nome', 'login', 'senha'], 'string', 'max' => 255],
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
            'nome' => 'Nome',
            'login' => 'Login',
            'senha' => 'Senha',
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
        return $this->hasMany(Coordena::className(), ['usuario_id' => 'id']);
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

    /**
     * Gets query for [[Ofertas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOfertas()
    {
        return $this->hasMany(Oferta::className(), ['usuario_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
 
    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //throw new  yii\base\UnknownPropertyException();
    }
 
        /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
 
    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        //throw new  yii\base\UnknownPropertyException();
    }
 
    public function validateAuthKey($authKey)
    {
        //throw new  yii\base\UnknownPropertyException();
    }
 
    public static function findByUsername($login){

        return self::findOne(['login' => $login]);
    }
 
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->senha);
    }

    public function beforeSave($insert)
    {
       if (parent::beforeSave($insert)) {
           $this->senha = Yii::$app->security->generatePasswordHash($this->senha);
           return true;
       } else {
           return false;
       }
    }

  



}

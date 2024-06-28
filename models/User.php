<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $car
 * @property int $role
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $password2;

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
 
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
 
    public function getId()
    {
        return $this->id;
    }
 
    public function getAuthKey()
    {
        return null;
    }
 
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'car', 'password2'], 'required'],
            ['email', 'email'],
            ['username', 'validateUsername'],
            ['password2', 'compare', 'compareAttribute' => 'password'],
            [['role'], 'integer'],
            [['username', 'email', 'password', 'car'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'password2'=> 'Confirm password',
            'car' => 'Car',
            'role' => 'Role',
        ];
    }

    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    static public function findByUsername($username)
    {
        return self::find()->where(['username'=>$username])->one();
    }

    public function validateUsername($attr)
    {
        $user = self::find()->where(['username'=> $this->username])->one();

        if($user != null){
            $this->addError($attr, 'This username is already taken.');
        }
    }
    
    public function beforeSave($insert){
        $this->password = md5($this->password);
        return true;
    }

    public function getIsAdmin()
    {
        return $this->role === 1;
    }
}

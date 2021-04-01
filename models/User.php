<?php

namespace app\models;

//class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface

use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
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
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

     /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
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
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function attributeLabels()
    {
        return [
            'start_vacation' => 'Начало отпуска',
            'end_vacation' => 'Конец отпуска',
            'approved' => 'Утвердить'
        ];
    }

    public function rules() {
        return [
            ['start_vacation', 'required'],
            ['start_vacation', 'validateDates'],
            ['end_vacation', 'required'],
            ['end_vacation', 'validateDates'],
            ['approved', 'safe']
        ];
    }

    public function validateDates($attribute, $params){
        if(strtotime($this->$attribute) < strtotime('2021-01-01')){
            $this->addError($attribute,'Дата указана до 2021');
        }

        if(strtotime($this->$attribute) > strtotime('2021-12-31')){
            $this->addError($attribute,'Дата указана после 2021');
        }
    }
}

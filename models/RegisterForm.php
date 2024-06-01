<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $full_name
 * @property string $login
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $auth_key
 * @property int $role_id
 *
 * @property Application[] $applications
 * @property Role $role
 */
class RegisterForm extends \yii\base\Model
{

    public string $full_name = '';
    public string $login = '';
    public string $email = '';
    public string $password = '';
    public string $password_repeat = '';
    public string $phone = '';
    public bool $rules = false;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'login', 'email', 'password', 'phone'], 'required'],
            [['full_name', 'login', 'email', 'password', 'phone'], 'string', 'max' => 255],
            [['login', 'email'], 'unique', 'targetClass' => User::class],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            ['password', 'string', 'min' => 8, 'tooShort' => 'минимум 8 символов'],
            // ['password', 'match', 'pattern' => '/^[a-z0-9\-]+$/i'],
            // ['login', 'match', 'pattern' => '/^[a-z0-9\-]+$/i'],
            // ['full_name', 'match', 'pattern' => '/^[а-яё\-]+$/iu'],
            ['email', 'email'],
            ['rules', 'required', 'requiredValue' => 1, 'message' => 'Пользовательское соглашение должно быть отмечено'],

            ['phone', 'match', 'pattern' => '/^\+7\(\d{3}\)\-\d{3}(\-\d{2}){2}$/'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'full_name' => 'Full Name',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Passwordrepeat',
            'phone' => 'Phone',
            'rules' => 'rules',
        ];
    }

    public function registerUser()
    {
       
        if ($this->validate()) {

            $user = new User();

            $user->attributes = $this->attributes;
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->role_id = Role::getRoleId('user');

            if (!$user->save()) return $user;
        }
        return $user ?? false;

    }
}

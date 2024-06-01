<?php
namespace app\models;
use Yii;
use yii\base\Model;
class Contact extends \yii\db\ActiveRecord
{

    public bool $rules = false;

    /**
    * @inheritdoc
    */
   public static function tableName()
   {
       return 'contact';
   }
   /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['name','email','message'], 'required'], //Checking that all the fields are required
            ['email', 'email'], // Validating that email is a valid email
            [['name'],'string', 'max' => 50], //Verifying that name is not greater than its max length
            [['email'], 'string', 'max' => 50], //Verifying that email is not greater than its max length
            [['message'], 'string', 'max' => 255],//Verifying that message is not greater than its max length
            ['rules', 'required', 'requiredValue' => 1, 'message' => 'Согласие на обработку персональных данных должно быть отмечено'],
            ['name', 'match', 'pattern' => '/^[а-яё\s\-]+$/iu'],
            ['message', 'match', 'pattern' => '/^[а-яё\s\-]+$/iu'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Как вас зовут(ФИО)',
            'email' => 'Почта',
            'message' => 'Ваше предложение/сообщение',
            'rules' => 'Согласие на обработку персональных данных',
        ];
    }
}
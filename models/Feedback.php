<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $content
 * @property string $photo
 * @property string $created_at
 */
class Feedback extends \yii\db\ActiveRecord
{

    // public string $name = '';
    public string $phone = '';
    // public string $content = '';
    // public string $photo = '';
    public $imageFile;
    // public string $created_at = '';
    public bool $rules = false;


    /**
    * {@inheritdoc}
    */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'content'], 'required'],
            [['content'], 'string', 'min' => 20],
            [['created_at'], 'safe'],
            [['name', 'phone', 'photo'], 'string', 'max' => 255],
            ['phone', 'match', 'pattern' => '/^\+7\(\d{3}\)\-\d{3}(\-\d{2}){2}$/'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, webp', 'maxSize' => 1024*1024*10],
            ['rules', 'required', 'requiredValue' => 1, 'message' => 'Согласие на обработку персональных данных должно быть отмечено'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя гостя',
            'phone' => 'Телефон',
            'content' => 'Отзыв',
            // 'photo' => 'Фото',
            'created_at' => 'Время',
            'rules' => 'Соглашение на обработку персональных данных',
            'imageFile' => 'Файл изображения',
        ];
    }

    public function upload(string $filed = 'photo')
    {
        if ($this->validate()) {
            $fileName = Yii::$app->security->generateRandomString(10)
            . '_'
            .time()
            . '.'
            . $this->imageFile->extension
            ;
            $this->imageFile->saveAs('img/' . $fileName );
            $this->$filed = $fileName;
            return true;
        } else {
            return false;
        }
    }
}

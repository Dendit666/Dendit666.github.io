<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $photo
 * @property string $created_at
 * @property int $status_id
 * @property int $category_id
 * @property int $user_id
 * @property string|null $admin_photo
 * @property string|null $reason
 *
 * @property Category $category
 * @property Status $status
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'photo', 'status_id', 'category_id', 'user_id'], 'required'],
            [['created_at'], 'safe'],
            [['status_id', 'category_id', 'user_id'], 'integer'],
            [['title', 'description', 'photo', 'admin_photo', 'reason'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Описание',
            'description' => 'Секретный ключ авторзации D',
            'photo' => 'Фото',
            'created_at' => 'Время',
            'status_id' => 'Ключ авторзации S',
            'category_id' => 'Ключ авторзации C',
            'user_id' => 'Ключ авторзации U',
            // 'admin_photo' => 'Admin Photo',
            // 'reason' => 'Reason',
            // 461
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}

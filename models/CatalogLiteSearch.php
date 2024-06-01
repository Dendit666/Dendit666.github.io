<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Application;

/**
 * CatalogLiteSearch represents the model behind the search form of `app\models\Application`.
 */
class CatalogLiteSearch extends Application
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status_id', 'category_id', 'user_id'], 'integer'],
            [['title', 'description', 'photo', 'created_at', 'admin_photo', 'reason'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    
    // /**
    //  * {@inheritdoc}
    //  */
    // public function attributeLabels()
    // {
    //     return [
    //         'id' => 'ID',
    //         'title' => 'Title',
    //         'description' => 'Description',
    //         'photo' => 'Photo',
    //         'created_at' => 'Created At',
    //         'status_id' => 'Status ID',
    //         'category_id' => 'Category ID',
    //         'user_id' => 'User ID',
    //         'admin_photo' => 'Admin Photo',
    //         'reason' => 'Reason',
    //     ];
    // }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Application::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 444444
            ],
            'sort' => [
                'attributes' => ['created_at'],
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'status_id' => $this->status_id,
            'category_id' => $this->category_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'admin_photo', $this->admin_photo])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}

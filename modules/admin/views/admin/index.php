<?php

use app\models\Application;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\AdminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'class' => LinkPager::class,
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'title',
                'filter' => false,
                'contentOptions' => ['style' => 'max-width: 1800px;'],
            ],
            // 'description',
            [
                'attribute' => 'photo',
                'filter' => false,
                'format' => 'html',
                'value' => fn($model) => Html::img('/img/'. $model->photo, ['class' => 'w-100']),
            ],
            [
                'label' => 'Действие',
                'format' => 'raw',
                'filter' => false,
                'contentOptions' => ['class' => 'd-flex-column'],
                'value' => fn($model) =>
                Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-outline-primary mb-5'])
                .
                Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-success mb-5'])
                .
                Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-outline-danger mb-5',
                    'data' => [
                        'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                        'method' => 'post',
                    ],
                ])

                
            ],
            'created_at',
            //'status_id',
            //'category_id',
            //'user_id',
            //'admin_photo',
            //'reason',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Application $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

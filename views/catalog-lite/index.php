<?php

use app\models\Application;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CatalogLiteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Новости Горэлектротранса в СПб';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Application', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}",
        // 'pager' => [
        //     'class' => LinkPager::class,
        // ],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            // 'description',
            [
                'attribute' => 'title',
                'filter' => false,
                'contentOptions' => ['style' => 'max-width: 1800px;'],
            ],
            
            [
                'attribute' => 'photo',
                'filter' => false,
                'format' => 'html',
                'value' => fn($model) => Html::img('/img/'. $model->photo, ['class' => 'w-100']),
            ],
            [
                'attribute' => 'created_at',
                'filter' => false,
            ],
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

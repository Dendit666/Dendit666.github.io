<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\models\Feedback $model */
/** @var ActiveForm $form */
$this->title = 'Отзывы о сайте Горэлектротранс СПб';
?>
<div class="feedback-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'phone')->widget(MaskedInput::class, ['mask' => '+7(999)-999-99-99',]) ?>
        <?= $form->field($model, 'content')->textarea() ?>
        <?= $form->field($model, 'imageFile')->fileInput() ?>
        <?= $form->field($model, 'rules')->checkbox() ?>

    
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- feedback-index -->



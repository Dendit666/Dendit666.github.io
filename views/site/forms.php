<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
$this->title = 'Контакт с Горэлектротрансом СПб';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
<div class="row">
   <div class="col-lg-5">
       <div class="panel panel-default">
            <div class="alert alert-success">
                Есть контакт! © Горэлектротранс СПб ©
            </div>
           <!-- <div class="panel-heading">Сообщение успешно отправлено</div> -->
           <div class="panel-body">
               <p><b>Имя:</b> <?=$model->name?> </p>
               <p><b>Почта:</b> <?=$model->email?> </p>
               <p><b>Ваше предложение/сообщение:</b> <?=$model->message?> </p>
           </div>
       </div>
       <div class="alert alert-success">
            Сообщение успешно отправлено! Благодарим Вас за обращение к нам. Мы ответим вам как можно скорее.
       </div>
   </div>
</div>
   <?php else: ?>
<div class="row">
           <div class="col-lg-5">
               <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                   <?= $form->field($model, 'name') ?>
                   <?= $form->field($model, 'email') ?>
                   <?= $form->field($model, 'message')->textArea(['rows' => 6]) ?>
                   <?= $form->field($model, 'rules')->checkbox() ?>
                  <div class="form-group">
                       <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                   </div>
               <?php ActiveForm::end(); ?>
           </div>
       </div>
<?php endif; ?>
<?php

namespace app\controllers;

use Yii;
use app\models\Feedback;
use yii\web\UploadedFile;

class FeedbackController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Feedback();
    
        if ($model->load($this->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->upload()) {
                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Отправлен!');
                    return $this->goHome();
                }
            }
        }
    
        return $this->render('index', [
            'model' => $model,
        ]);
    }


    
}

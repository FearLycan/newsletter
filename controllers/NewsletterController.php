<?php

namespace app\controllers;


use app\models\forms\NewsletterForm;
use Yii;
use yii\web\Controller;

class NewsletterController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new NewsletterForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->send();
            Yii::$app->session->setFlash('success', "Your newsletter was send to " . $model->to);

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionSend()
    {

    }
}
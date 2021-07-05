<?php

namespace app\modules\admin\controllers;

use app\models\LoginForm;
use Yii;

class AuthController extends AppAdminController {

    public $layout = 'auth';

    public function actionLogin() {
        $this->setMeta("Вход в админку");
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin');
//            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin');
//            return $this->goBack();
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout() {
        $this->setMeta("Выход из админки");
        Yii::$app->user->logout();
        return $this->redirect('/admin');
//        return $this->goHome();
    }

}
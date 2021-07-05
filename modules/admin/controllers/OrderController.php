<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\OrderProduct;
use Yii;
use app\modules\admin\models\Order;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class OrderController extends AppAdminController {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $this->setMeta('Список заказов');
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
            /*'pagination' => [
                'pageSize' => 2,
            ],*/
            'sort' => [
                'defaultOrder' => [
                    'status' => SORT_ASC,
                ]
            ]
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id) {
        $model = $this->findModel($id);
        $this->setMeta("Заказ № {$model->id}");
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionCreate() {
        $this->setMeta("Добавление заказа");
        $model = new Order();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $this->setMeta('Редактирование заказа № ' . $model->id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Заказ обновлен');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id) {
        //$this->findModel($id)->unlinkAll('orderProduct', true);
        $this->findModel($id)->delete();
        OrderProduct::deleteAll(['order_id' => $id]);
        return $this->redirect(['index']);
    }

    protected function findModel($id) {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
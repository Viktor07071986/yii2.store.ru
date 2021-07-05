<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Product;
use Yii;
use app\modules\admin\models\Category;
use app\modules\admin\models\CategorySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CategoryController extends AppAdminController {

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
        $this->setMeta('Категории');
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id) {
        $model = $this->findModel($id);
        $this->setMeta("Категория: " . $model->title);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionCreate() {
        $this->setMeta('Добавление категории');
        $model = new Category();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $this->setMeta('Редактирование категории: ' . $model->title);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id) {
        $cats = Category::find()->where(['parent_id' => $id])->count();
        $products = Product::find()->where(['category_id' => $id])->count();
        if($cats || $products) {
            Yii::$app->session->setFlash('error', 'Удаление невозможно: к категории прикреплены другие категории или товары');
        } else {
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('success', 'Категория удалена');
        }
        return $this->redirect(['index']);
    }

    protected function findModel($id) {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
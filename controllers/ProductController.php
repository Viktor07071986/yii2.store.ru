<?php

namespace app\controllers;

use app\models\Product;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use Yii;

class ProductController extends AppController {

    public function actionView($id) {
        $product = Product::findOne($id);
        if(empty($product)) {
            throw new NotFoundHttpException('Такого продукта нет...');
        }
        $this->setMeta("{$product->title} :: " . Yii::$app->name, $product->keywords, $product->description);
        return $this->render('view', compact('product'));
    }

    public function actionSearch() {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta("Поиск: {$q} :: " . Yii::$app->name);
        if(!$q) {
            return $this->render('search');
        }
        $query = Product::find()->where(['like', 'title', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }

}
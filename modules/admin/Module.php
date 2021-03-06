<?php

namespace app\modules\admin;

use yii\filters\AccessControl;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init() {
        parent::init();
        // custom initialization code goes here
    }

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

}
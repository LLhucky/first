<?php
namespace frontend\controllers;

use Yii;
use frontend\models\T1;
use yii\web\Controller;


class TestController extends Controller
{
    public $layout=false;
    public function actionIndex()
    {
        $t1s=T1::find()->where(['id'=>1])->one();
        echo '<pre>';
        print_r($t1s);
    }

    
}

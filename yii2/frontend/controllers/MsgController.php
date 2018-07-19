<?php
namespace frontend\controllers;

use Yii;
use frontend\models\Msg;
use yii\web\Controller;


class MsgController extends Controller
{
    public $layout=false;
    public $enableCsrfValidation=false;
    public function actionIndex()
    {
    	$msgs=Msg::find()->all();
        return $this->render('index',compact('msgs'));
    }

    public function actionAdd(){
    	if(Yii::$app->request->isPost){
    		$uname=Yii::$app->request->post('uname');
    		$content=Yii::$app->request->post('content');
    		$msg=new Msg;
    		$msg->uname=$uname;
    		$msg->content=$content;
    		$msg->created_at=$msg->updated_at=time();
    		$rs=$msg->save();
    		return $this->redirect(['/msg']);
    	}
    }
}

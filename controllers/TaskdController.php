<?php

namespace app\controllers;
use Yii;
use app\models\Taskd;

use app\models\UploadFile;
use yii\web\Controller;
use yii\web\UploadedFile;

class TaskdController extends Controller
{

    public function actionIndex()
    {
    	
        $comments = Taskd::getByCurrentComments($_GET['taskid'])->all();
       
        $model = new UploadFile();

        if(\Yii::$app->request->isPost)
        {
        	$model->file =  UploadedFile::getInstance($model,'file');

        	$model->saveUploadedFile();

            $this->redirect(array('taskd/index','taskid'=> $_GET['taskid']));
            


        }


         return $this->render('index', ['comments' => $comments,'model' => $model]);

    }

    public function actionTest()
    {

    	

    }


}

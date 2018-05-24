<?php
namespace app\controllers;
// use yii\db\Query;
use app\models\Users;
use yii\web\controller;

class TestController extends Controller 
{
	public function actionTest()
	{
		$id = $_GET['id'];
		$model = Users::find()->all();
		var_dump($model);
	}

	public function create()
	{
		// return $this->render('test');
		$model = new Users();
		$model->username = 'admin';
		$model->password = md5('admin');
		$model->save();
		var_dump($model);
		// $query = new Query();
		// $query->select(['username','password'])->from('users')->all();
		// var_dump($query);
		// exit;
	}

}
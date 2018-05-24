<?php

namespace app\commands;

use yii\console\Controller;

class RbacController extends Controller
{
	public function actionInit()
	{
		$am = \Yii::$app->authManager;

		$admin = $am->createRole('admin');
		$moder = $am->createRole('moder');

		$operationIsAdmin = $am->createPermission("isAdmin");

		$am->add($operationIsAdmin);

		$am->addChild($admin, $operationIsAdmin);
		
		$am->add($admin);
		$am->add($moder);

		$am->assign($admin, 1);
	}
}

?>
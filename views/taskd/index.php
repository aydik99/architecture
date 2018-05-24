<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;






if(isset(Yii::$app->user->id))
{


?>


<h1><?php echo  \Yii::t("msg","notice")." ".$_GET['taskid']; ?></h1>

 <?php 
 	$form = \yii\widgets\ActiveForm::begin();
 	echo $form->field($model, 'content')->textInput();
	echo $form->field($model, 'file')->fileInput();
	echo \yii\helpers\Html::submitButton('Download', ['class' => 'btn btn-success']);
	\yii\widgets\ActiveForm::end();

echo "<div class='container'>";
if(count($comments) > 0)
{
 foreach ($comments as $comment)

{
 	echo "<div class='row'><div class='col-sm'><img src='/img/small/".$comment->image."' /></div><div class='col-sm'>".$comment->comment_desc."</div></div><br/>";
  }
}
else 
{
	echo "Нет комментарии";
}

}

 else {

 echo "Необходимо <a href='http://yii2/index.php?r=site%2Flogin'>войти</a>";
        }

echo "</div>"
       ?>

</div>

  




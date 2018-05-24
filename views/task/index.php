<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>





<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php 
    $b = $_GET['month'];
    switch ($b){
case 1: $m='январь'; break;
case 2: $m='февраль'; break;
case 3: $m='март'; break;
case 4: $m='апрель'; break;
case 5: $m='май'; break;
case 6: $m='июнь'; break;
case 7: $m='июль'; break;
case 8: $m='август'; break;
case 9: $m='сентябрь'; break;
case 10: $m='октябрь'; break;
case 11: $m='ноябрь'; break;
case 12: $m='декабрь'; break;
}

if(isset($b))
        {


echo "<h2 class='month'>".$m."</h2>";

}
if(isset(Yii::$app->user->id))
{

?>

<table class="table table-bordered">
    <tr>
        <td>Дата</td>
        <td>Событие</td>
        <td>Всего событий</td>
    </tr>
    <?php foreach ($calendar as $day => $events): ?>
        <tr>
            <td class="td-date"><span class="label label-success"><?= $day; ?></span></td>
            <td>
                    <?php 
                        if(count($events) > 0)
                        {
                            foreach ($events as $event) {

                                echo '<p><a href="/?r=taskd&taskid='. $event->id .'">' . $event->name . '</p><p class="small">'.
                    $event->description .'</a></p>';
                            }
                           
                        }

                        else 
                        {
                            echo '-';
                        }
                    ?>
            </td>
            <td class="td-event"><?= (count($events) > 0) ? Html::a(count($events),
                    Url::to(['task/events', 'date' => $events[0]->date])) : '-'; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

   
   <?php } else {

        echo "Необходимо <a href='http://yii2/index.php?r=site%2Flogin'>войти</a>";
        }?>
</div>

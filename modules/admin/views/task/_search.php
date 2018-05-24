<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

  <p>
    <label>Страна</label>
    <select name="month">
      <option value="1">Январь</option>
      <option value="2">Февраль</option>
      <option value="3">Март</option>
      <option value="4">Апрель</option>
      <option value="5">Май</option>
      <option value="6">Июнь</option>
      <option value=" 8">Август</option>
      <option value="9">Сентябрь</option>
      <option value="10">Октябрь</option>
      <option value="11">Ноябрь</option>
      <option value="12">Декабрь</option>
    </select>
  </p>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

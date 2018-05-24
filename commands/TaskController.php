<?php


namespace app\commands;

use Yii;
use app\models\Task;
use yii\console\Controller;


class TaskController extends Controller
{

    public function actionTest()
    {
        $tasks = Task::getByCurrentMonthAll(date('n'))->all();

        foreach ($tasks as $task){
            $date = \DateTime::createFromFormat("Y-m-d H:i:s", $task->date);
            $result =abs($date->format("j") - date('d'));

            if($result<=3)
            {
               echo  "The deadline for tasks on  day - ".$date->format("j")." in ".$result." for users number id- ".$task->user_id."; "; //на почту пользователя, мы можем отправить ему email с предупреждением,  что осталось менее 3 дней до дедлайна.
            }
            
         }

    }
}

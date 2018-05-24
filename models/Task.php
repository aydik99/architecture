<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $name
 * @property string $date
 * @property string $description
 * @property int $user_id
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const EVENT_REGISTER_START = 'register_start';

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'create_at',
                'updatedAtAttribute' => 'update_at',
                'value' =>  new Expression('NOW()')
            ],
        ];
    }

    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date'], 'required'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date' => 'Date',
            'description' => 'Description',
            'user_id' => 'User ID',
        ];
    }

    public static function getByCurrentMonth($month,$id)
    {
       
        return static::find()->where(['MONTH(date)' => 
           $month])->andwhere(['user_id' => 
           $id]);

    }


        public static function getByCurrentMonthAll($month)
    {
       
        return static::find()->where(['MONTH(date)' => 
           $month]);

    }

     public static function getByCurrentUser($id)
    {
       
        return static::find()->where(['user_id' => 
           $id]);

    }


    public function register()
{
    $this->trigger(static::EVENT_REGISTER_START);
    echo "Заявка зарегистрирована";
}
}



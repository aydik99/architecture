<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $comment_desc
 * @property string $image
 * @property int $comment_id
 */
class Taskd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_id'], 'integer'],
            [['comment_desc', 'image'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment_desc' => 'Comment Desc',
            'image' => 'Image',
            'comment_id' => 'Comment ID',
        ];
    }

      public static function getByCurrentComments($id)
    {
       
        return static::find()->where(['comment_id' => 
           $id]);

    }
}

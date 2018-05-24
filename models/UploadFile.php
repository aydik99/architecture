<?php

namespace app\models;

use Yii;
use yii\base\Model;
 use \yii\imagine\Image;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $name
 * @property string $date
 * @property string $description
 * @property int $user_id
 * @property string $create_at
 * @property string $update_at
 */
class UploadFile extends Model
{
    public $content;
    public $file;

 

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [['content'],'string'],
           [['file'], 'file', 'extensions' => 'jpg, png']
        ];
    }


    public function saveUploadedFile()
    {
        if($this->validate())
        {

        $path = \Yii::getAlias("@webroot/img/");
        $path .= $this->file->getBaseName().".".$this->file->getExtension();
        $this->file->saveAs($path);
        \yii\imagine\Image::thumbnail($path,200,100)->save(\Yii::getAlias("@webroot/img/small/".$this->file->getBaseName().".".$this->file->getExtension()));
        $model1 = new Taskd();
        $model1->comment_desc = $_POST['UploadFile']['content'];
        $model1->image = $this->file->getBaseName().".".$this->file->getExtension();
        $model1->comment_id = $_GET['taskid'];
        $model1->save();
        
        }
        
    }

}

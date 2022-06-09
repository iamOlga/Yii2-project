<?php
namespace frontend\models;

use yii\base\Model;

class CommentForm extends Model
{
    
    public $text;
    public function rules(){
        return[[['text'],'required']];  
    }

}
<?php
namespace frontend\models;

use yii\base\Model;

class AccountForm extends Model
{
    public $user_name;
    public $service_name;
    public $user_phone;
    public $date;
    public $time;
    public function rules(){
        return[[['user_name','user_phone', 'service_name', 'date','time'],'required'],  
        ['phone', 'match', 'pattern' => '/\+375\s\([0-9]{2}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/', 'message' => ' Что-то не так' ]];  
    }

}
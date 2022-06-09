<?php
namespace frontend\controllers;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

use frontend\models\AccountForm;
use frontend\models\Reception;
use frontend\models\Services;

class AccountController extends Controller{
    public function actionIndex()
    {
        $services=Services::find()->orderBy('id')->all();
        if(!Yii::$app->request->get()['category']){
            $category=Services::find()->where(['category_name' => 'Терапия'])->all();
           
        } else {
            $category=Services::find()->where(['category_name' => Yii::$app->request->get()['category']])->all();
        }
       
        
        return $this->render('index',[
            'Services'=>$services,
            'Category'=> $category,
            'name' => Yii::$app->request->get()['сategory']
        ]);

        
    }

    public function actionForm(){
        $model = new AccountForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('error', [
                'model' => $model,
            ]);
        }else{
            return $this->render('form', [
                'model' => $model,
            ]);
        }
    }

    public function actionOrders(){
        $orders=Reception::find()->orderBy('id')->where(['status' => 'принято', 'user_name' => Yii::$app->user->identity->username])->all();

        return $this->render('orders', [
            'Orders'=>$orders
        ]);
    }

    public function actionDelete(){
        $order_delete=Reception::find()->where(['user_name' => Yii::$app->user->identity->username, 'service_name' => Yii::$app->request->get()['service_name'], 'time' => Yii::$app->request->get()['time'], 'date' => Yii::$app->request->get()['date'], 'status' => 'принято'])->one();
        $order_delete->status='отменено';
        $order_delete->save();
        $orders=Reception::find()->orderBy('id')->where(['status' => 'принято', 'user_name' => Yii::$app->user->identity->username])->all();
        return $this->render('orders', [
            'Orders'=>$orders
        ]);
    }

    public function actionAdd(){
        $model = new AccountForm();
        $flag = true;
        if ($model->load(Yii::$app->request->post())) {

            $services=Reception::find()->orderBy('id')->all();
            foreach ($services as $item){
                if ($model->service_name == $item->service_name && $model->date == $item->date && $model->time == $item->time && 'принято' == $item->status){
                    $flag = false;
                }
            }
            if ($flag){
                $reception = new Reception();
                $reception->user_name = $model->user_name;
                $reception->user_phone = $model->user_phone;
                $reception->service_name = $model->service_name;
                $reception->date = $model->date;
                $reception->time = $model->time;
                $reception->status = 'принято';

                $reception->save(); 
                Yii::$app->session->setFlash('success', 'Вы записаны на прием!');
                return $this->goHome();   
            }
            else{
                Yii::$app->session->setFlash('error', 'Это время занято.');

                return $this->render('form', [
                    'model' => $model,
                ]);
            }
        }
    }
}
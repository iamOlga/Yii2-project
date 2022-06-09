<?php
namespace frontend\controllers;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

use frontend\models\Likes;
use frontend\models\Services;
/* use frontend\models\LikesForm; */


class LikesController extends Controller{
    public function actionLikes()
    {
        $likes = Likes::find()->all();
        
        $Services=Services::find()->all();

        $likes_arr = array();
        foreach ($Services as $Service){
            $count_likes=Likes::find()->where(['doctor' => $Service->doctor])->count();
            $likes_arr[$Service->doctor] = $count_likes;
        }

        $likes_user_query=Likes::find()->where(['user_name' => Yii::$app->user->identity->username])->all();

        $likes_user = array();
        foreach ($likes_user_query as $like_user){
            array_push($likes_user, $like_user->doctor);
        }

        return $this->render('likes',[
            'Likes' => $likes,
            'Services'=>$Services,
            'Count' => $likes_arr,
            'Likes_user' => $likes_user,
        ]);
    }

    public function actionAdd(){
        $likes_user_query=Likes::find()->where(['doctor' => Yii::$app->request->get('doctor_name'), 'user_name' => Yii::$app->user->identity->username])->count();
        if($likes_user_query == 0){
            $like = new Likes();
            $like->user_name = Yii::$app->user->identity->username;
            $like->doctor = Yii::$app->request->get('doctor_name');
            $like->save(); 
        }
        else{
            $like = Likes::find()->where(['doctor' => Yii::$app->request->get('doctor_name'), 'user_name' => Yii::$app->user->identity->username])->one();
            $like->delete();
        }
            
        return $this->redirect(['likes']);
    }

}
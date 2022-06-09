<?php
namespace frontend\controllers;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

use frontend\models\Comments;
use frontend\models\CommentForm;
/* use frontend\models\Reception;
use frontend\models\Services; */

class CommentsController extends Controller{
    public function actionComments()
    {
        $model = new CommentForm();
        if ($model->load(Yii::$app->request->post())) {
            $comment = new Comments();
            $comment->user_name = Yii::$app->user->identity->username;
            $comment->text = $model->text;
            $comment->save(); 
        }
        $comments=Comments::find()->orderBy('id DESC')->all();
        return $this->render('comments',[
            'model' => $model,
            'Comments' => $comments,
        ]); 
    }

}
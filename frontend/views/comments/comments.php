<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\MaskedInput;
?>
<?= $this->registerCssFile('css/comments.css', ['depends' => ['frontend\assets\AppAsset']]) ?>

<?php $form = ActiveForm::begin(['id' => 'comments-form', 'action' => Url::to(['/comments/comments'])]); ?>
   <div class='add_comments_container'>
      <h3>Оставь отзыв</h3>

      <div>
         <?= $form->field($model, 'text')->textarea(['rows' => '4', 'style' => 'resize:none', 'value' => ''])->label(false) ?>
         <?= Html::submitButton('Отправить', ['class' => 'button_submit']) ?>
      </div>  
   </div>


<?php ActiveForm::end(); ?>



<?php Pjax::begin();?>
        
        <div class="comments_container">
           <?php 
              foreach ($Comments as $Comment):    
           ?>
     
              <div class="comment_container">
                 <p class="user_name"><?=Html::encode("{$Comment->user_name}") ?></p>
                 <p><?=Html::encode("{$Comment->text}") ?></p>
              </div>
             
           <?php 
              endforeach; 
           ?>
           
        </div>
     
     
<?php Pjax::end();?>
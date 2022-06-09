<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\MaskedInput;
?>
<?= $this->registerCssFile('css/comments.css', ['depends' => ['frontend\assets\AppAsset']]) ?>

<?php Pjax::begin();?>
<div class="likespage_container">
    <h3>Наши врачи</h3>

    <div class="doctors_container">

        <?php 
            foreach ($Services as $Service):    
                $img = "@web/img/doctors/doctor_" . $Service->id . ".jpg";
        ?>
            <div class="doctor">
                <?=Html::img($img, ['alt' => $Service->doctor, 'class' => 'doctor_img'])?>
                <p class="doctor_name"><?=Html::encode("{$Service->doctor}") ?></p>
                <p class="doctor_service"><?=Html::encode("{$Service->service_name}") ?></p>

                <?php 
                    $count = $Count[$Service->doctor];
                    $class = "like_img";

                        if(in_array($Service->doctor, $Likes_user)){
                            $class = "like_img_active";
                        }
                        else
                        {
                            $class = "like_img";
                        }
                ?>
                    <div class="div_likes">
                        <a class=<?=$class?> href="<?=Url::toRoute(['likes/add', 'doctor_name' => $Service->doctor]);?>"></a>
                        <p class="count_likes"><?=$count?></p>            
                    </div>
                
                    
            </div>
        <?php 
            endforeach; 
        ?>

    </div>
</div>
<?php Pjax::end();?>
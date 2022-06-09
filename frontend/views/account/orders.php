<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<?= $this->registerCssFile('css/account.css', ['depends' => ['frontend\assets\AppAsset']]) ?>




    <div class="container_orders">
    <h5>Ваши заказанные талоны на посещение, <?= Yii::$app->user->identity->username?></h5>

        <?php 
            foreach ($Orders as $Order):    
        ?>

        <div class="orders_service">
            <div>
                <p><?=Html::encode("{$Order->user_name}") ?></p>
                <p><?=Html::encode("{$Order->service_name}") ?></p>
            </div>
            <div>
                <p><?=Html::encode("{$Order->time}") ?></p>
                <p><?=Html::encode("{$Order->date}") ?></p>
            </div>
            <div>
                <p><?=Html::encode("{$Order->status}") ?></p>
                <a class="categories_buttons" href="<?=Url::toRoute(['account/delete', 'service_name'=>$Order->service_name, 'time'=>$Order->time, 'date'=>$Order->date ]);?>">Отменить</a>

            </div>
        </div>
        
        <?php 
            endforeach; 
        ?> 
 
    </div>

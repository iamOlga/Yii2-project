<?php
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\web\UrlManager;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\_Reception $model */
?>
<?= $this->registerCssFile('css/account.css', ['depends' => ['frontend\assets\AppAsset']]) ?>
 <h5> Здравствуйте, <?= Yii::$app->user->identity->username?></h5>
<h3>Заказать талон на посещение</h3>
<?php 
    $categories = array();
    foreach ($Services as $Service){
        if (!in_array($Service->category_name, $categories)) {
            array_push($categories, $Service->category_name);
        }
    }
?>
<?php Pjax::begin();?>
        
        <div class="container_account">
        <h5>Выберите услугу из нужной категории</h5>
        
            <div class="container_categories">
                <?php 
                    for($i=0; $i<count($categories); $i++){
                ?>
                    <a class="categories_buttons" href="<?=Url::toRoute(['account/index', 'category'=> $categories[$i]]);?>"><?=Html::encode("{$categories[$i]}")?></a>
                <?php        
                    }
                ?>
            </div>

            <div class="container_service">
                <?php 
                    foreach ($Category as $Categories):    
                ?>

                <div>
                    
                    <a class="categories_buttons" href="<?=Url::toRoute(['account/form', 'category'=>$Categories->service_name ]);?>"><?=Html::encode("{$Categories->service_name}") ?></a>
                </div>
        
                <?php 
                    endforeach; 
                ?>     
            </div>
        
            <a class="categories_buttons talons_button" href="<?=Url::toRoute(['account/orders']);?>">Мои талоны</a>
    </div>


<?php Pjax::end();?>
 

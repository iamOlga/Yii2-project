<?php
use yii\helpers\Html;
use yii\widgets\linkpager;
?>
<?= $this->registerCssFile('css/services.css', ['depends' => ['frontend\assets\AppAsset']]) ?>
 <h1>Услуги</h1>
<?php 
    $categories = array();
    foreach ($Services as $Service){
        if (!in_array($Service->category_name, $categories)) {
            array_push($categories, $Service->category_name);
        }
    }
?>
<div class="container_services">
 <?php 
    for($i=0; $i<count($categories); $i++){
?>

    <div class="item">
        <p class="item_category">
            <?=Html::encode("{$categories[$i]}")?>
        </p>

 <?php 
    foreach ($Services as $Service): 
        if($Service->category_name == $categories[$i]){
?>
    <div class="service">
        <p class="item_service">
            <?=Html::encode("{$Service->service_name} - {$Service->doctor}") ?>
        </p>
        <p class="item_price">
            <?=Html::encode("Цена: {$Service->price}byn") ?>
        </p>
    </div>
 
 <?php }
    endforeach; 
?>

    </div>

<?php 
  }
?>

</div>

 

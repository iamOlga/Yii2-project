<?php
use yii\helpers\Html;
use yii\widgets\linkpager;
?>
<?= $this->registerCssFile('css/account.css', ['depends' => ['frontend\assets\AppAsset']]) ?>
 <h1>Услуги</h1>
<?php 
    $categories = array();
    foreach ($Services as $Service){
        if (!in_array($Service->category_name, $categories)) {
            array_push($categories, $Service->category_name);
        }
    }
?>
<div class="container_account">
    <?php 
        for($i=0; $i<count($categories); $i++){
    ?>

    <div class="item">
        <p class="item_category">
            <?=Html::encode("{$categories[$i]}")?>
        </p>
        <select>
        <option>Выберите услугу</option>
        <?php 
            foreach ($Services as $Service): 
                if($Service->category_name == $categories[$i]){
        ?>

        <!-- <select> -->
            <option><?=Html::encode("{$Service->service_name}") ?></option>
    
            <?php 
                }
            ?>

        <!-- </select> -->

        <?php
            endforeach; 
        ?>
        
        </select>
    </div>

    <?php 
        }
    ?>

</div>

 

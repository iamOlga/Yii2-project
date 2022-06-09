<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\MaskedInput;
?>
<?= $this->registerCssFile('css/account.css', ['depends' => ['frontend\assets\AppAsset']]) ?>

<?php $form = ActiveForm::begin(['id' => 'reception-form', 'action' => Url::to(['/account/add'])]); ?>

    <div class="container_account">

        <?= $form->field($model, 'service_name')->textInput(['value'=>Yii::$app->request->get()['category']])->label('Услуга') ?>

        <div class="container_date_time">
        
            <?= $form->field($model, 'date')->textInput(['type' => 'date'])->label('Выберите дату') ?>

                <?= $form->field($model, 'time')
                    ->radioList([
                    '12:00' => '12:00',
                    '14:00' => '14:00',
                    '16:00' => '16:00'
                    ])->label('Выберите время'); 
                ?>
        </div>

        <div class="container_info">
            <div>
                <?= $form->field($model, 'user_name')->textInput(['value' => Yii::$app->user->identity->username])->label('Введите имя') ?>
            </div>
            <div>
                <?= $form->field($model, 'user_phone')->label('Введите телефон')->widget(MaskedInput::className(),['mask'=>'+375 (99) 999-99-99'])->textInput(['placeholder' => '+375 (29) 999-99-99']) ?>
            </div>        
        </div>  
        
        <div class="form-group">
            <?= Html::submitButton('Заказать', ['class' => 'button_submit']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>
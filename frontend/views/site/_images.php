<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;

$image = $img ? '<img src="' . $img . '">' : '';

?>

<?php Pjax::begin() ?>

<?php $form = ActiveForm::begin([
    'id' => 'test-form',
    'action' => Url::to(['site/index']),
    'options' => [
        'class' => 'form-horizontal',
        'data-pjax' => true]
]); ?>

    <span class="image-list">
        <?=$image ?>
    </span>

    <div class="container">
        <?= $form->field($tree, 'reCaptcha')->widget(
            \himiklab\yii2\recaptcha\ReCaptcha2::className(),
            [
                'siteKey' => '6LcT46cUAAAAALLibUBIduNa1NTpJ5idfErQZiDF', // unnecessary is reCaptcha component was set up
            ]
        ) ?>

        <div class="form-group">
            <?= Html::submitButton('Продолжить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>
    </div>
    <div class="clearfix"></div>

<?php ActiveForm::end(); ?>
<?php Pjax::end() ?>
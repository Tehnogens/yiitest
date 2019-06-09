<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';

\yii\bootstrap\Modal::begin([
    'header' => '<h2>Images</h2>',
    'footer' => '',
]); ?>

<div id="modal_value">

</div>

<?php \yii\bootstrap\Modal::end(); ?>

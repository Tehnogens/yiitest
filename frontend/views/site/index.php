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

    <?=$this->render('_images', ['tree'  => $tree]); ?>

</div>

<?php \yii\bootstrap\Modal::end(); ?>

<div>
    <ul>
        <?php foreach ($model as $key => $value): ?>
            <?php $tree::getChildNode($value); ?>
        <?php endforeach; ?>
    </ul>
</div>

<?php

$script = <<< JS
    $(function() {
        $('.a-link').click(function () {
            $('#w0').modal('show');
            $('.image-list').html('');
        });
    });
JS;

$this->registerJs($script);

?>

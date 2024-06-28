<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Parkings $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="parkings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'entry_date')->textInput(['placeholder' => 'YYYY-MM-DD']) ?>

    <?= $form->field($model, 'exit_date')->textInput(['placeholder' => 'YYYY-MM-DD']) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

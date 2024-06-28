<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Parkings $model */

$this->title = 'Update Parkings: ' . $model->id;

?>
<div class="parkings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_adminform', [
        'model' => $model,
    ]) ?>

</div>

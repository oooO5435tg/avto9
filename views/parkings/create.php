<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Parkings $model */

$this->title = 'Take parking slot';

?>
<div class="parkings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

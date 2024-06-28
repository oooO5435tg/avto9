<?php

use app\models\Parkings;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Parkings';
?>


<h1>Парковка</h1>

<ul>
    <?php foreach ($parkings as $parking):?>
        <li>
            <?= $parking->entry_date?> - <?= $parking->exit_date?> (<?= $parking->cost?> руб.)
            <?= $parking->user->username?> - <?= $parking->user->car?>
            <?php if ($parking->discount):?>
                (Скидка: <?= $parking->discount?>%)
            <?php endif;?>
            <?php if ($parking->debt):?>
                (Задолженность: <?= $parking->debt?> руб.)
            <?php endif;?>
            <?= Html::a('Освободить', ['delete', 'id' => $parking->id], [
                'data' => [
                    'confirm' => 'Вы уверены, что хотите освободить парковочный слот?',
                    'method' => 'post',
                ],
            ])?>
        </li>
    <?php endforeach;?>
</ul>

<?= Html::a('Занять парковочный слот', ['create'])?>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterLayanan $model */

$this->title = 'Update Master Layanan: ' . $model->id_layanan;
$this->params['breadcrumbs'][] = ['label' => 'Master Layanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_layanan, 'url' => ['view', 'id_layanan' => $model->id_layanan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-layanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

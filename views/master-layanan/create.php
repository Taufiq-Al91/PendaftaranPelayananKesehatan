<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterLayanan $model */

$this->title = 'Form Tambah Layanan';
$this->params['breadcrumbs'][] = ['label' => 'Master Layanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-layanan-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

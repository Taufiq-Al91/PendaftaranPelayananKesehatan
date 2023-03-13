<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TrxRegistrasi $model */

$this->title = 'Tambah Pasien';
$this->params['breadcrumbs'][] = ['label' => 'Trx Registrasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trx-registrasi-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

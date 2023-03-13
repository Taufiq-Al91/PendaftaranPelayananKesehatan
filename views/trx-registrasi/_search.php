<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TrxRegistrasiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trx-registrasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama_pasien') ?>

    <?= $form->field($model, 'jenis_kelamin') ?>

    <?= $form->field($model, 'tanggal_lahir') ?>

    <?= $form->field($model, 'jenis_registrasi') ?>

    <?php // echo $form->field($model, 'id_layanan') ?>

    <?php // echo $form->field($model, 'jenis_pembayaran') ?>

    <?php // echo $form->field($model, 'status_registrasi') ?>

    <?php // echo $form->field($model, 'waktu_mulai_pelayanan') ?>

    <?php // echo $form->field($model, 'waktu_selesai_pelayanan') ?>

    <?php // echo $form->field($model, 'time_create') ?>

    <?php // echo $form->field($model, 'petugas_pendaftaran') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

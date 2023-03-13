<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\TrxRegistrasi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trx-registrasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pasien')->textInput(['maxlength' => true]) ?>

  
    <?= $form->field($model, 'jenis_kelamin')->DropDownList(['Laki - Laki' => 'Laki - Laki', 'Perempuan' => 'Perempuan'], ['prompt' => 'Pilih Status Registrasi']) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukkan tanggal lahir ...'],

        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
        'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>
    <?= $form->field($model, 'jenis_registrasi')->DropDownList(['Rawat Jalan' => 'Rawat Jalan', 'UGD' => 'UGD', 'Rawat Inap' => 'Rawat Inap'], ['prompt' => 'Pilih Jenis Registrasi']) ?>

    <?= $form->field($model, 'id_layanan')->dropDownList(
        ArrayHelper::map(\app\models\MasterLayanan::find()->all(), 'id_layanan', 'jenis_layanan'),
        ['prompt' => 'Pilih Jenis Layanan']
    ) ?>


<?= $form->field($model, 'jenis_pembayaran')->DropDownList(['Umum' => 'Umum', 'BPJS Kesehatan' => 'BPJS Kesehatan', 'Mandiri Inhealth' => 'Mandiri Inhealth', 'BNI Life' => 'BNI Life'], ['prompt' => 'Pilih Jenis Pembayaran']) ?>





    <?= $form->field($model, 'status_registrasi')->DropDownList(['Tutup Kunjungan' => 'Tutup Kunjungan', 'Aktif' => 'Aktif'], ['prompt' => 'Pilih Status Registrasi']) ?>

    <?= $form->field($model, 'waktu_mulai_pelayanan')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Masukkan Waktu Mulai Pelayanan ...'],

        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
        'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ]
    ]); ?>
    <?= $form->field($model, 'waktu_selesai_pelayanan')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Masukkan Waktu Selesai Pelayanan ...'],

        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
        'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ]
    ]); ?>

<?= $form->field($model, 'petugas_pendaftaran')->dropDownList(
        ArrayHelper::map(\app\models\MasterAdmin::find()->all(), 'id', 'username'),
        ['prompt' => 'Pilih Petugas Pendaftaran ...']
    ) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
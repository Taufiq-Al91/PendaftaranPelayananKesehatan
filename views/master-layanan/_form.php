<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MasterLayanan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="master-layanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis_layanan')->textInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

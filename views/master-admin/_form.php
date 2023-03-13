<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MasterAdmin $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="master-admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey')->textInput(['maxlength' => true, 'value' => Yii::$app->security->generateRandomString()]) ?>


    <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true, 'value' => Yii::$app->security->generateRandomString()]) ?>





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

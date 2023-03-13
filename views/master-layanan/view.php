<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MasterLayanan $model */

$this->title = $model->jenis_layanan;
$this->params['breadcrumbs'][] = ['label' => 'Master Layanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-layanan-view">

    

    <p>
        <?= Html::a('Update', ['update', 'id_layanan' => $model->id_layanan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_layanan' => $model->id_layanan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_layanan',
            'jenis_layanan',
            'time_create',
        ],
    ]) ?>

</div>

<?php

use app\models\MasterLayanan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MasterLayananSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jenis Layanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-layanan-index">

    

    <p>
        <?= Html::a('Tambah Layanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_layanan',
            'jenis_layanan',
            'time_create',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MasterLayanan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_layanan' => $model->id_layanan]);
                 }
            ],
        ],
    ]); ?>


</div>

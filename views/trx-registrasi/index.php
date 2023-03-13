<?php

use app\models\TrxRegistrasi;
use app\models\MasterLayanan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TrxRegistrasiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Rekam Medis Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trx-registrasi-index">

 

    <p>
        <?= Html::a('Tambahkan Pasien', ['create'], ['class' => 'btn btn-success']) ?>
        <?=Html::a('Export to PDF', Url::to(['pdf']), ['class' => 'btn btn-info']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute' =>'time_create',
                'label' => 'Waktu Registrasi' 
            ],
            [
                'attribute' => 'no_registrasi',
                'label' => 'No. Registrasi'
            ],
            [
                'attribute' => 'id',
                'label' => 'No. Rekam Medis'
            ],
           
            [
                'attribute' => 'nama_pasien',
                'label' => 'Nama Pasien'
            ],
            [
                'attribute' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin'
            ],
            [
                'attribute' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir'
            ],
            [
                'attribute' => 'jenis_registrasi',
                'label' => 'Jenis Registrasi'
            ],
            [
                'attribute' => 'jenis_layanan',
                'value' => function ($model) {
                    return $model->layanan->jenis_layanan;
                },
                'label' => 'Layanan',
            ],
            
            [
                'attribute' => 'jenis_pembayaran',
                'label' => 'Jenis Pembayaran'
            ],
            [
                'attribute' => 'status_registrasi',
                'label' => 'Status Registrasi'
            ],
            [
                'attribute' => 'waktu_mulai_pelayanan',
                'label' => 'Waktu Mulai Pelayanan'
            ],
            [
                'attribute' => 'waktu_selesai_pelayanan',
                'label' => 'Waktu Selesai Pelayanan'
            ],
            
            [
                'attribute' => 'petugas_pendaftaran',
                'value' => function ($model) {
                    return $model->petugas->username;
                },
                'label' => 'Petugas Pendaftaran',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TrxRegistrasi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>



</div>

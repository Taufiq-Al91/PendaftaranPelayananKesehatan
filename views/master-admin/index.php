<?php

use app\models\MasterAdmin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MasterAdminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Daftar Petugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-admin-index">


    <p>
        <?= Html::a('Tambah Petugas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'password',
           // 'authKey',
            //'accessToken',
           // 'role',
            //'time_create',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MasterAdmin $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

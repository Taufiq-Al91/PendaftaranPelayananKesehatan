<?php use yii\helpers\Url; ?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::to(['site/index']) ?>" class="brand-link">
        <img src="https://www.nicepng.com/png/detail/7-70152_open-logo-baru-dinas-kesehatan.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Health Register</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <?php if (!Yii::$app->user->isGuest): ?>
                
                <a href="<?= Url::to(['site/index']) ?>" class="d-block"><?= $username = Yii::$app->user->identity->username; ?></a>
                <?php endif; ?>
</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                   
                   
                    ['label' => 'MENU', 'header' => true],
                    ['label' => 'Rekam Medis', 'url' => ['trx-registrasi/index'], 'icon' => 'nav-icon fas fa-heartbeat'],
                    ['label' => 'Tambah Layanan', 'url' => ['master-layanan/index'], 'icon' => 'nav-icon fas fa-wrench'],
                    ['label' => 'Tambah Petugas', 'url' => ['master-admin/index'], 'icon' => 'nav-icon fas  fa-user-plus'],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                   
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php


use yii\helpers\Html;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>



        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">

        </form>

        <!-- Right navbar links -->


        <li class="nav-item">
            <?= Html::beginForm(['/site/logout'], 'post');
            echo Html::submitButton(
                '<i class="fas fa-sign-out-alt"></i>',
                ['class' => 'nav-link logout']
            );
            echo Html::endForm(); ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
<?php
// Set the page title
$this->title = 'Welcome!';

// Set the breadcrumb trail to show only the page title
$this->params['breadcrumbs'] = [
    ['label' => $this->title]
];
?>

<div class="site-index">
    <div class="jumbotron">
        <h1>Welcome to our website!</h1>
        <p>We are glad you decided to visit us.</p>
        <p><a class="btn btn-primary btn-lg" href="#body-content" role="button">Learn more</a></p>
    </div>

    <div class="body-content">
        <h2>Overview</h2>
        <p>Website ini Merupakan Website Pendaftaran pasien diSuatu Instansi Rumah Sakit</p>
    </div>
</div>



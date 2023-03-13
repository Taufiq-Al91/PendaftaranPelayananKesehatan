    <?php

    use yii\helpers\Html;
    use yii\helpers\Url;

    // Konfigurasi tabel
    $tableOptions = [
        'class' => 'table table-striped table-bordered',
        'style' => 'width:100%;',
    ];

    // Header tabel
    $headers = ['Kolom 1', 'Kolom 2', 'Kolom 3'];

    // Isi tabel
    $rows = [];
    foreach ($data as $row) {
        $rows[] = [
            $row['kolom1'],
            $row['kolom2'],
            $row['kolom3'],
        ];
    }

    // Tampilkan tabel
    echo Html::tag('h2', 'Data Export PDF');
    echo Html::tag('p', 'Tanggal: ' . date('d/m/Y H:i:s'));
    echo Html::beginTag('table', $tableOptions);
    echo Html::beginTag('thead');
    echo Html::beginTag('tr');
    foreach ($headers as $header) {
        echo Html::tag('th', $header);
    }
    echo Html::endTag('tr');
    echo Html::endTag('thead');
    echo Html::beginTag('tbody');
    foreach ($rows as $row) {
        echo Html::beginTag('tr');
        foreach ($row as $cell) {
            echo Html::tag('td', $cell);
        }
        echo Html::endTag('tr');
    }
    echo Html::endTag('tbody');
    echo Html::endTag('table');

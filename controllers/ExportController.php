<?php


use yii\web\Controller;
use yii\helpers\Html;
use kartik\mpdf\Pdf;

class ExportController extends Controller
{
    public function actionPdf()
    {
        // Query data dari database
        $data = Yii::$app->db->createCommand('SELECT * FROM trx_registrasi')->queryAll();

        // Konfigurasi TCPDF
        $pdf = new Pdf([
            // Nama file PDF yang akan dihasilkan
            'filename' => 'Export PDF.pdf',
            // Ukuran dan orientasi halaman
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // Konfigurasi margin
            'marginLeft' => 15,
            'marginRight' => 15,
            'marginTop' => 16,
            'marginBottom' => 16,
            // Konfigurasi header dan footer
            'options' => [
                'title' => 'Export PDF',
            ],
            'methods' => [
                'SetHeader' => ['Export PDF'],
                'SetFooter' => ['{PAGENO}'],
            ],
        ]);

        // Mengisi konten PDF dengan data dari database
        $pdf->content = $this->renderPartial('_pdf', ['data' => $data]);

        // Menghasilkan file PDF
        return $pdf->render();
    }
}

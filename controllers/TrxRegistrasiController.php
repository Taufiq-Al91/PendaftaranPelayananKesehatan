<?php

namespace app\controllers;
use Yii;
use app\models\TrxRegistrasi;
use app\models\TrxRegistrasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use kartik\mpdf\Pdf;

/**
 * TrxRegistrasiController implements the CRUD actions for TrxRegistrasi model.
 */
class TrxRegistrasiController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TrxRegistrasi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TrxRegistrasiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrxRegistrasi model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TrxRegistrasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TrxRegistrasi();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TrxRegistrasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TrxRegistrasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TrxRegistrasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TrxRegistrasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrxRegistrasi::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPdf()
    {
        // Query data dari database
        $data = Yii::$app->db->createCommand('
        SELECT
            trx_registrasi.*,
            master_layanan.jenis_layanan,
            master_admin.username
        FROM
            trx_registrasi
        INNER JOIN
            master_layanan ON trx_registrasi.id_layanan = master_layanan.id_layanan
        INNER JOIN
            master_admin ON trx_registrasi.petugas_pendaftaran = master_admin.id
    ')->queryAll();
    

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

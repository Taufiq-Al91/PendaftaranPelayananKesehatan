<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'index'], // action mana saja yang harus dilakukan autentikasi
                'rules' => [
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'], // hanya pengguna yang telah masuk yang diizinkan untuk mengakses aksi ini
                    ],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
        // Lakukan verifikasi pengguna untuk memastikan bahwa pengguna memiliki akses ke halaman admin
    
    }
    public function actionPendaftaran()
    {
        return $this->render('pendaftaran');
        // Lakukan verifikasi pengguna untuk memastikan bahwa pengguna memiliki akses ke halaman admin

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
{
    if (!Yii::$app->user->isGuest) {
        // jika pengguna sudah login, arahkan ke halaman utama admin
        return $this->redirect(['index']);
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
        // jika login berhasil, arahkan ke halaman utama admin
        return $this->redirect(['index']);
    }

    return $this->render('login', [
        'model' => $model,
    ]);
}


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
   
    

}

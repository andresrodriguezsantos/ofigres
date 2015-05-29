<?php

namespace app\controllers;

use app\models\Noticias;
use app\models\Producto;
use app\models\Usuario;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $layout = 'main2';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        $this->layout = 'main';
        /** @var Noticias $noticia */
        $noticia = Noticias::find()->where(['estado'=>1])->orderBy(['id' => SORT_DESC])->one();
        return $this->render('index',[
            'noticia'=>$noticia
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['/noticias']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/noticias']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->mailer->compose('contact',[
                'model'=>$model
            ])->setTo(Yii::$app->params['adminEmail'])
                ->setFrom($model->email)
                ->setSubject('Contacto - Ofigres.com')
                ->send();
            Yii::$app->session->setFlash('success','Mensaje enviado correctamente gracias!');
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionResena(){
        return $this->render('resena');
    }

    public function actionMision(){
        return $this->render('misionvision');
    }

    public function actionObjetosocial(){
        return $this->render('objetosocial');
    }

    public function actionPoliticas(){
        return $this->render('politicascalidad');
    }

    public function actionNoticias(){
        $noticias = Noticias::find()
            ->where(['estado'=>1])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(6)
            ->all();
        return $this->render('noticias',[
            'noticia'=>$noticias
        ]);
    }

    public function actionVerdetalle($id){
        $noticia = Noticias::findOne($id);
        if($noticia!=null){
            return $this->render('verdetallenoticia',[
                'noticia'=>$noticia
            ]);
        }
    }

    public function actionCatalogo(){
        $this->layout = 'main2';
        $productos = Producto::findAll(['estado'=>'1']);
        return $this->render('listaproducto',[
            'productos'=>$productos
        ]);
    }

    public function actionCreateuser(){
        /** @var Usuario $usuario */
        $usuario = new Usuario();
        $usuario->nombres = 'Sindy';
        $usuario->apellidos = 'Jefe de Sala';
        $usuario->email = 'inversionesofircolombia@gmail.com';
        $usuario->password = 'F16res86';
        $usuario->password = Yii::$app->security->generatePasswordHash($usuario->password);
        $usuario->save();
        Yii::$app->authManager->assign(
            Yii::$app->authManager->getRole(Yii::$app->request->post('Administrador')),
                $usuario->id
        );
        return var_dump('Usuario creado correctamente');
    }
}

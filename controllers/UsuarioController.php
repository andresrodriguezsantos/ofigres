<?php

namespace app\controllers;
use app\models\Usuario;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\rbac\Role;

class UsuarioController extends \yii\web\Controller
{
    public $layout = 'main3';

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['admin','eliminar'],
                'rules' => [
                    [
                        'actions' => ['admin','eliminar'],
                        'allow' => true,
                        'roles' => ['Gerente'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'eliminar' => ['post'],
                ],
            ],
        ];
    }


    public function actionAdmin()
    {
        $usuario = new Usuario();
        $lista = Usuario::find()->all();
        if(Yii::$app->request->post()){
            $usuario->load(\Yii::$app->request->post());
            $usuario->password = Yii::$app->security->generatePasswordHash($usuario->password);
            $usuario->save();
            Yii::$app->authManager->assign(
                Yii::$app->authManager->getRole(Yii::$app->request->post('rol')),
                $usuario->id
            );
            Yii::$app->session->setFlash('success','Usuario creado correctamente');
            $usuario = new Usuario();
        }
        /** @var Role $roles */
        $roles = Yii::$app->authManager->getRoles();
        $data = ArrayHelper::map($roles,'name','name');
        return $this->render('form_usuario',[
            'user'=>$usuario,
            'lista'=>$lista,
            'data'=>$data
        ]);
    }


    public function actionEliminar($id){
        $usuario = Usuario::findOne($id);
        if($usuario!=null){
            if( $usuario->delete())
                Yii::$app->session->setFlash('success','Datos Eliminados Correctamente');
        }
        return $this->redirect(['admin']);
    }
    public function actionEditar($id){
        $usuario = Usuario::findOne($id);
        if($usuario!=null){
            if(Yii::$app->request->post()){
                $usuario->load(Yii::$app->request->post());
                if($usuario->save()){
                    Yii::$app->session->setFlash('success','Datos modificados corretamente');
                    return $this->redirect(['admin']);
                }
            }
        }
        $lista = Usuario::find()->all();
        $roles = Yii::$app->authManager->getRoles();
        $data = ArrayHelper::map($roles,'name','name');
        return $this->render('form_usuario',[
            'user'=>$usuario,
            'lista'=>$lista,
            'data'=>$data
        ]);
    }
    public function actionCrearrolesmanager(){
        $aut = Yii::$app->authManager;
        $gerente = $aut->createRole('Gerente');
        $aut->add($gerente);

       $administrador = $aut->createRole('Administrador');
        $aut->add($administrador);

       $secretaria = $aut->createRole('secretaria');
        $aut->add($secretaria);

        $aut->addChild($gerente,$administrador);
    }

}

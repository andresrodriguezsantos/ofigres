<?php

namespace app\controllers;

use app\models\Noticias;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class NoticiasController extends \yii\web\Controller
{

public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['admin','eliminar','index','editar'],
                'rules' => [
                    [
                        'actions' => ['index','editar','admin','eliminar'],
                        'allow' => true,
                        'roles' => ['Administrador','secretaria'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'eliminar,index,editar' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'main3';
        $noticias = new Noticias();
        if(Yii::$app->request->post()){
            $noticias->load(\Yii::$app->request->post());
            $noticias->fecha = new Expression('NOW()');
            $noticias->picture = UploadedFile::getInstance($noticias, 'picture');
            if($noticias->picture){
                if(file_exists(Yii::$app->basePath.'/web/'.$noticias->urlimg))
                   /* unlink(Yii::$app->basePath.'/web/'.$noticias->urlimg);*/
                $ruta = 'uploads/noticias/' . $noticias->picture->baseName .rand(0,1000). '.' . $noticias->picture->extension;
                $noticias->picture->saveAs($ruta);
                $noticias->urlimg = $ruta;
            }
            if($noticias->save()){
                $noticias = new Noticias();
                Yii::$app->session->setFlash('success','Noticia Guardada Correctamente');
                return $this->redirect(['admin']);
            }
        }
        return $this->render('form_noticias',[
            'noticia'=>$noticias
        ]);
    }

    public function actionAdmin(){
        $this->layout = 'main3';
        $noticias = Noticias::find();
        $list = new ActiveDataProvider([
            'query' => $noticias,
        ]);
        return $this->render('admin',[
            'noticias'=>$list
        ]);
    }

    public function actionEliminar($id){
        $noticia = Noticias::findOne($id);
        if($noticia!=null){
            if( $noticia->delete())
                Yii::$app->session->setFlash('success','Datos Eliminados Correctamente');
        }
        return $this->redirect(['admin']);
    }

    public function actionEditar($id){
        $this->layout = 'main3';
        $noticia = Noticias::findOne($id);
        if($noticia!=null){
            if(Yii::$app->request->post()){
                $noticia->load(\Yii::$app->request->post());
                //$noticia->fecha = date('NOW()');
                $noticia->picture = UploadedFile::getInstance($noticia, 'picture');
                if($noticia->picture){
                    if(file_exists(Yii::$app->basePath.'/web/'.$noticia->urlimg))
                        /* unlink(Yii::$app->basePath.'/web/'.$noticias->urlimg);*/
                        $ruta = 'uploads/' . $noticia->picture->baseName .rand(0,1000). '.' . $noticia->picture->extension;
                    $noticia->picture->saveAs($ruta);
                    $noticia->urlimg = $ruta;
                }
                if($noticia->save()){
                    Yii::$app->session->setFlash('success','Noticia Modificada Correctamente');
                }else{
                    return var_dump($noticia->getErrors());
                }
            }
            return $this->render('form_editar',[
                'noticia'=>$noticia]
            );
        }
            //return throw new c

    }

}

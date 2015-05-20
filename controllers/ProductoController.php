<?php

namespace app\controllers;

use app\models\Producto;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

class ProductoController extends \yii\web\Controller
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


    public $layout = 'main3';
    public function actionIndex(){
        $producto = new Producto(['scenario'=>'insert']);
        if(Yii::$app->request->isAjax){
            $producto->load(Yii::$app->request->post());
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($producto);
        }
        if(\Yii::$app->request->post()){
            $producto->load(\Yii::$app->request->post());
            $producto->picture = UploadedFile::getInstance($producto, 'picture');
            if($producto->picture){
                if(file_exists(Yii::$app->basePath.'/web/'.$producto->urlimg))
                    /* unlink(Yii::$app->basePath.'/web/'.$noticias->urlimg);*/
                    $ruta = 'uploads/productos/' . $producto->picture->baseName .rand(0,1000). '.' . $producto->picture->extension;

                $producto->urlimg = $ruta;
            }
            if($producto->save()){
                $producto->picture->saveAs($ruta);
                $producto = new Producto();
                Yii::$app->session->setFlash('success','Producto Creado Correctamente');
                return $this->redirect(['admin']);
            }
        }
        return $this->render('form_producto',[
            'producto'=>$producto
        ]);
    }

    public function actionAdmin(){
        $productos = Producto::find();
        $list = new ActiveDataProvider([
            'query' => $productos,
        ]);
        return $this->render('admin',[
            'productos'=>$list
        ]);
    }

    public function actionEliminar($id){
        $producto = Producto::findOne($id);
        if($producto!=null){
            if( $producto->delete())
                Yii::$app->session->setFlash('success','Datos Eliminados Correctamente');
        }
        return $this->redirect(['admin']);
    }

    public function actionEditar($id)
    {
        $producto = Producto::findOne($id);
        $producto->scenario = 'update';
        if ($producto != null) {
            if (Yii::$app->request->post()) {
                $producto->load(\Yii::$app->request->post());
                //$noticia->fecha = date('NOW()');
                $producto->picture = UploadedFile::getInstance($producto, 'picture');
                if ($producto->picture) {
                    if (file_exists(Yii::$app->basePath . '/web/' . $producto->urlimg))
                        /* unlink(Yii::$app->basePath.'/web/'.$noticias->urlimg);*/
                        $ruta = 'uploads/productos/' . $producto->picture->baseName . rand(0, 1000) . '.' . $producto->picture->extension;

                    $producto->urlimg = $ruta;
                }
                if ($producto->save()) {
                    if($producto->picture){
                        $producto->picture->saveAs($ruta);
                    }
                    Yii::$app->session->setFlash('success', 'Producto Modificado Correctamente');
                } else {
                    return var_dump($producto->getErrors());
                }
            }
            return $this->render('form_editar', [
                    'producto' => $producto]
            );
        }
    }



}

<?php
use yii\grid\GridView;
use yii\helpers\Html;
/** @var $productos \app\models\Producto*/
?>

<div class="panel panel-default panel-info col-md-12">
    <div class="panel-heading">
        <h3 class="box-title" style="color: #8EC4EC">Listado de Productos</h3>
    </div>
    <div class="panel-body">
        <?=
        GridView::widget([
            'dataProvider'=>$productos,
            'columns'=>[
                'descripicion',
//        [
//            'value'=>substr($noticias->cuerpo,0 ,200)
//        ],
                'medida',
                'nota',

                [
                    'class'=>\yii\grid\ActionColumn::className(),
                    'template'=>"{editar} {eliminar}",
                    'buttons'=>[
                        'editar'=> function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
                                'data-pjax' => '0',
                                'class'=>'btn btn-lg btn-info form-group',
                                'title'=>'Editar el Producto'
                            ]);
                        },
                        'eliminar'=>function($url, $productos){
                            return  $this->render('@app/views/layouts/modals/delete',[
                                'btn'=>[
                                    'label'=>'<span class="glyphicon glyphicon-trash"></span>',
                                    'tag'=>'a',
                                    'class'=>'btn btn-lg btn-danger form-group',
                                    'title'=>'Eliminar el Producto'
                                ],
                                'url'=>[
                                    'eliminar','id'=>$productos->id
                                ]
                            ]);
                        }
                    ],
                     'options'=>['style'=>'word-wrap:break-word; width:130px;'],
                ]
            ]
        ]) ?>
    </div>
</div>

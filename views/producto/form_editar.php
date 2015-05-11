<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $producto app\models\Producto */
/* @var $form ActiveForm */
?>

<div class="panel panel-default panel-info col-md-12">
    <div class="panel-heading" style="overflow: hidden">
        <h2 class="panel-title">Formulario para Editar Productos</h2>
        <div class="pull-right">
            <?php Modal::begin([
                'header' => '<h2>Ayuda</h2>',
                'toggleButton' => ['label' => 'Ayuda'],
            ]);
            echo ' Para poder Editar un producto diligencielos campos del formulario que desee cambiar. <br>
                   Los archivos a subir solo permiten formatos de imagenes en .jpg , .png , jpeg <br>
                   ';
            Modal::end(); ?>
        </div>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
            'action'=>['editar','id'=>$producto->id]
        ]); ?>
        <div class="col-md-6">
            <?= $form->field($producto, 'descripicion') ?>
            <?= $form->field($producto, 'medida') ?>
            <?= $form->field($producto, 'nota')->textarea(['rows'=>6,'cols'=>'6']) ?>
            <?= $form->field($producto, 'picture')->fileInput() ?>
            <?= $form->field($producto, 'estado')->dropDownList(['1'=>'Activo','0'=>'Inactivo']) ?>
            <div class="panel-footer">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Regresar', Yii::$app->request->getReferrer(), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mid-grid-left  wow bounceInRight" data-wow-delay="0.4s">
                <?=Html::img(\yii\helpers\Url::base().'/'.$producto->urlimg,['style'=>'max-height:270px'])?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>




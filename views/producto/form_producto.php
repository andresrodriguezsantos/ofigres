<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $producto app\models\Producto */
/* @var $form ActiveForm */
?>

<div class="panel panel-default panel-info  col-md-12">
    <div class="panel-heading" style="overflow: hidden">
        <h2 class="panel-title">Formulario para ingresar Productos</h2>
        <div class="pull-right">
            <?php Modal::begin([
                'header' => '<h2>Ayuda</h2>',
                'toggleButton' => ['label' => 'Ayuda'],
            ]);
            echo ' Para poder Crear una producto diligencie los campos del formulario. <br>
                    Solo son obligatorios los campos de Descripcion y la imagen de Archivos<br>
                   Los archivos a subir solo permiten formatos de imagenes en .jpg , .png , jpeg <br>
                   ';
            Modal::end(); ?>
        </div>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
            //'enableAjaxValidation'=>true
        ]); ?>
        <div class="col-md-6">
            <?= $form->field($producto, 'descripicion') ?>
            <?= $form->field($producto, 'medida') ?>
            <?= $form->field($producto, 'nota')->textarea(['rows'=>6,'cols'=>'6']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($producto, 'picture')->fileInput() ?>
            <div class="panel-footer">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>




<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Noticias */
/* @var $form ActiveForm */
?>
<div class="panel panel-default panel-info col-md-12">
    <div class="panel-heading" style="overflow: hidden;">
        <h2 class="panel-title">Formulario para ingresar Nuevas Noticias</h2>
        <div class="pull-right">
            <?php Modal::begin([
                'header' => '<h2>Ayuda</h2>',
                'toggleButton' => ['label' => 'Ayuda'],
               // 'options'=>['class'=>'panel-success'],
            ]);
            echo ' Para poder crear una noticia diligencie todos los campos del formulario. <br><br>
                   Todos los datos son obligatorios <br><br>
                   Los archivos a subir solo permiten formatos de imagenes en .jpg , .png , jpeg <br><br>
                   El cuerpo de la noticia no puede contener mas de 1000 letras (contando los espacios).
                   ';
            Modal::end(); ?>
        </div>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>
        <div class="col-md-6">
            <?= $form->field($noticia, 'titulo') ?>
            <?= $form->field($noticia, 'cuerpo')->textarea(['cols' => '6', 'rows' => '6']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($noticia, 'picture')->fileInput() ?>
            <?= $form->field($noticia, 'piedefoto') ?>
            <div class="panel-footer">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>


</div><!-- noticias-form_noticias -->

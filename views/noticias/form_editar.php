<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Noticias */
/* @var $form ActiveForm */
?>
<div class="panel panel-default panel-info col-md-12">
    <div class="panel-heading" style="overflow: hidden">
        <h2 class="panel-title" style="overflow: hidden">Formulario para editar noticias</h2>
        <div class="pull-right">
            <?php Modal::begin([
                'header' => '<h2>Ayuda</h2>',
                'toggleButton' => ['label' => 'Ayuda'],
            ]);
            echo ' Para poder Editar una noticia diligencielos campos del formulario que desee cambiar. <br>
                   Los archivos a subir solo permiten formatos de imagenes en .jpg , .png , jpeg <br>
                   El cuerpo de la noticia no puede contener mas de 1000 letras (contando los espacios).
                   ';
            Modal::end(); ?>
        </div>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
            'action'=>['editar','id'=>$noticia->id]
        ]); ?>
        <div class="col-md-6">
            <?= $form->field($noticia, 'titulo') ?>
            <?= $form->field($noticia, 'cuerpo')->textarea(['cols'=>'6','rows'=>'6']) ?>
            <?= $form->field($noticia, 'picture')->fileInput() ?>
            <?= $form->field($noticia, 'piedefoto') ?>
            <?= $form->field($noticia, 'estado')->dropDownList(['1'=>'Activo','0'=>'Inactivo']) ?>
        </div>
        <div class="col-md-6">
            <div class="mid-grid-left  wow bounceInRight" data-wow-delay="0.4s">
                <?= /** @var \app\models\Noticias $noticia */
                \yii\helpers\Html::img(\yii\helpers\Url::base().'/'.$noticia->urlimg,['style'=>'max-height:270px'])?>
            </div>
            <br/><br/>
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
                 <?= Html::a('Regresar', Yii::$app->request->getReferrer(), ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>


</div><!-- noticias-form_noticias -->

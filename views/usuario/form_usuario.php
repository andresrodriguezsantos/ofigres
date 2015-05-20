<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form ActiveForm */
?>
    <div class="panel panel-default panel-info col-md-12">
        <div class="panel-heading" style="overflow: hidden">
            <h2 class="panel-title">Formulario para ingresar Usuarios</h2>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($user, 'nombres') ?>
                <?= $form->field($user, 'apellidos') ?>
                <?= $form->field($user, 'email') ?>
                <?= $form->field($user, 'password')->passwordInput() ?>
                <?= Html::dropDownList('rol','',$data,['class'=>'form-control']); ?>
                <div class="panel-footer">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
                </div>
               <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th><th>Apellido</th><th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php /** @var \app\models\Usuario $l */
                        foreach($lista as $l) {?>
                            <tr>
                                <td><?= $l->nombres ?></td>
                                <td><?= $l->apellidos ?></td>
                                <td>
                                    <?=  $this->render('@app/views/layouts/modals/delete',[
                                        'btn'=>[
                                            'label'=>'<i class="glyphicon glyphicon-remove"></i> Eliminar',
                                            'tag'=>'a',
                                            'class'=>'btn btn-xs btn-danger form-group'
                                        ],
                                        'url'=>[
                                            'eliminar','id'=>$l->id
                                        ]
                                    ]); ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

</div><!-- form_usuario -->

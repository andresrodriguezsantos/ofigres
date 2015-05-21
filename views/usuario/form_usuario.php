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
            <div class="col-md-12">
                <?php /** @var \app\models\Usuario $user */?>
                <?php $user->email ="";$user->password = "" ?>
                <?php $form = ActiveForm::begin(); ?>

                <div class="col-md-6">
                    <?= $form->field($user, 'nombres') ?>
                    <?= $form->field($user, 'apellidos') ?>
                    <div class="panel-footer">
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <?= $form->field($user, 'email') ?>
                    <?= $form->field($user, 'password')->passwordInput() ?>
                    <?= Html::dropDownList('rol','',$data,['class'=>'form-control']); ?>
                </div>
               <?php ActiveForm::end(); ?>
            </div>
        </div>

</div><!-- form_usuario -->
<div class="panel panel-default panel-info col-md-12">
    <div class="panel-heading" style="overflow: hidden">
        <h2 class="panel-title">Lista de usuarios registrados con acceso al sistema</h2>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nombre</th><th>Apellido</th><th>Email</th><th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php /** @var \app\models\Usuario $l */
                foreach($lista as $l) {?>
                    <tr>
                        <td><?= $l->nombres ?></td>
                        <td><?= $l->apellidos ?></td>
                        <td><?= $l->email ?></td>
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
                            <?= Html::a('editar',['editar','id'=>$l->id],['class'=>'btn btn-info btn-xs']) ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


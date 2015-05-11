<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default col-md-12" style=" text-align: center; margin:0 auto;">
    <div class=" panel panel-heading">
        <h2> Ingresar al sistema</h2>
    </div>
    <div class="col-md-4">

    </div>
    <div class="panel-body col-md-4" style=" text-align: center; margin:0 auto;">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
            ]); ?>
            <label for="">Nombre de Usuario</label>
            <?= $form->field($model, 'username')->label(false) ?>
            <label for="">Contraseña</label>
            <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
            <?= $form->field($model, 'rememberMe', [])->checkbox() ?>
            <div class="panel-footer" style="overflow: hidden">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
    </div>
    <div class="col-md-4">

    </div>
</div>

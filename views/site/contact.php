<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
$this->title = 'contacto';
?>
<div class="contact-us">
    <div class="col-md-12" style="text-align: center">
        <h2 style="color: #0B479D">Formulario de Contacto</h2>
    </div>
    <br/><br/>
    <div class="contact-us_left col-md-6">
        <div class="company_address">
            <h3 class="style">Nuestra Informacion</h3>
            <p>Dirección: Av. 6AE # 10-111 ßarrio La Riviera</p>
            <p>Cúcuta, Norte de Santander</p>
            <p>Telf.: 5 776984</p>
            <p>Cel.: 311 527 9656</p>
            <p>Email: <a href="#">contacto@ofigres.com</a></p>
            <p>Siguenos en: <a href="#">Facebook</a>, <a href="https://www.youtube.com/channel/UCV-V0f5m4otn3g3bal1WMqQ">Youtube</a></p>
        </div>
            <?= Html::img(\yii\helpers\Url::base() . '/theme/images/logoofigres.png', ['class'=>'img-responsive']) ?>
    </div>

    <div class="contact_right">
        <div class="contact-form">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'subject') ?>
                <?= $form->field($model,'name') ?>
                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


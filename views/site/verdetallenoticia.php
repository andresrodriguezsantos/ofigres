<?php
use yii\helpers\Html;
$this->title = 'Detalle de noticia';
?>
<div class="container">
    <div class="best-seller" style="overflow: hidden;">
        <div class="biseller-info" style="overflow: hidden;">
            <div class="col-md-12">
                <div class="col-md-7 wow bounceInLeft" data-wow-delay="0.4s">
                    <h2 style="text-align: center"><?= /** @var \app\models\Noticias $noticia */
                        $noticia->titulo ?></h2>
                    <p style="text-align: justify">
                        <?= $noticia->cuerpo ?><br/>
                        <?= Html::a('Regresar', Yii::$app->request->getReferrer(), ['class' => 'btn btn-primary']) ?>
                    </p>

                </div>
                <div class="col-md-5">
                    <br/><br/><br/>
                    <div class="mid-grid-left  wow bounceInRight" data-wow-delay="0.4s">
                        <?= /** @var \app\models\Noticias $noticia */
                        \yii\helpers\Html::img(\yii\helpers\Url::base().'/'.$noticia->urlimg,['style'=>'max-height:300px'])?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
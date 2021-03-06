<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Ofigres.com';
?>
<div class="col-lg-12">
     <div class="col-md-4 wow bounceInLeft" data-wow-delay="0.4s">
         <?= Html::img(\yii\helpers\Url::base() . '/theme/images/logoofigres.png', ['class'=>'img-responsive']) ?>
     </div>
    <div class="col-md-8 wow bounceInRight" data-wow-delay="0.4s">
        <h2 class="pull-left" style="color:#0B479D">INVERSIONES OFIR DE COLOMBIA</h2>
    </div>
</div>
<div class="col-md-12">
    <div class="welcome-note">
        <div class="welcome-note-grids">
            <div class="col-md-4 wow bounceInLeft" data-wow-delay="0.4s">
                <div class="welcome-note-left text-right">
                    <h2 align="center">Reseña Historica</h2>
                </div>
            </div>
            <div class="col-md-8 welcome-grid wow bounceInRight" data-wow-delay="0.4s">
                <div class="welcome-note-right ">
                    <div class="col-md-8">
                        <div class="welcome-note-right-left">
                            <p align="justify">
                                INVERSIONES OFIR COLOMBIA SAS (OFIGRES), fue creada el  1 de julio del 2010,
                                para dar respuesta a las necesidades del sector de la construcción y la remodelación
                                mediante la oferta de un portafolio de productos de obra (porcelana sanitaria,
                                pisos y enchapes cerámicos, pinturas, griferías etc.).
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="welcome-note-right-right">
                            <?= Html::a('Leer mas',['resena']) ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="clearfix"> </div>
<div class="bottom-grids">
    <div class="container">
        <div class="mid-grid">
        <?php if($noticia!=null){ ?>
            <div class="col-md-4 mid-grid-left  wow bounceInRight" data-wow-delay="0.4s">
                    <?= /** @var \app\models\Noticias $noticia */
                    \yii\helpers\Html::img(\yii\helpers\Url::base().'/'.$noticia->urlimg,['style'=>'max-height:270px'])?>
            </div>
            <?php }?>
            <?php if($noticia!=null){ ?>
            <div class="col-md-8 mid-grid-right  wow bounceInLeft" data-wow-delay="0.4s">
                <br/>
                <h4><?= \yii\helpers\Html::a($noticia->titulo,['/site/verdetalle','id'=>$noticia->id]) ?></h4><br>
                <!-- <h4><?= $noticia->titulo ?></h4><br/> -->
                <?php $tex = substr($noticia->cuerpo,0 ,500);?>
                <p align="justify"><?= $tex ?>  </p>
            </div>
        <?php } ?>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

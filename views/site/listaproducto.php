<?php $this->title = 'Catalogo de productos'; ?>
<div class="container">
    <div class="best-seller" style="overflow: hidden;">
        <div class="biseller-info" style="overflow: hidden;">
            <div class="col-md-12 wow bounceInLeft" data-wow-delay="0.4s">
                <h2>Nuestro Catalogo de Productos</h2>
                <div class="service-grids">
                    <?php
                    /** @var \app\models\Producto $prod */
                    use yii\helpers\Html;
                    use yii\helpers\Url;
                    $ik = 1;
                    foreach($productos as $prod){ ?>
                        <?= $ik==1? '<div class="col-md-12">' : ''?>
                        <div class="col-md-4 service-grid">
                            <?=Html::img(Url::base().'/'.$prod->urlimg,['style'=> 'height:300px','class'=>'img-thumbnail'])?>
                            <h4 style="text-align: center"><?= $prod->descripicion ?></h4>
                            <p class="sg" style="text-align: center"><?= $prod->medida?><br/><?= $prod->nota ?></p>
                        </div>
                        <?= $ik==3?'</div>': ''  ?>
                        <?php $ik = ($ik==3? 0 : $ik ) ?>
                    <?php $ik++; } ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
     </div>
</div>





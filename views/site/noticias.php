<?php /** @var \app\models\Noticias $noticia */ ?>
<div class="container">
    <div class="team-history">
        <div class="best-seller" style="overflow: hidden;">
            <div class="biseller-info" style="overflow: hidden;">
                <div class="col-md-12">
                    <h2 align="center">Mantenganse al tanto de nuestros articulos</h2>

                    <?php
                    foreach ($noticia as $not) { ?>
                        <div class="history-lines">
                            <ul>
                                <div class="col-md-3">
                                    <li class="date"><span><?= $not->fecha ?></span></li>
                                </div>
                                <div class="col-md-7">
                                    <li class="date-info">
                                            <h4><?= \yii\helpers\Html::a($not->titulo,['/site/verdetalle','id'=>$not->id]) ?></h4>
                                        <p style="text-align : justify;">
                                            <?= substr($not->cuerpo,0,290).' ... '.\yii\helpers\Html::a('Leer mas',['/site/verdetalle','id'=>$not->id]) ?>
                                        </p>
                                    </li>
                                </div>
                            </ul>
                            <div class="col-md-2 mid-grid-left">
                                <?= \yii\helpers\Html::img(\yii\helpers\Url::base() . '/' . $not->urlimg, ['style' => 'max-height:120px']) ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
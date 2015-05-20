<?php $this->registerJs("
        new WOW().init();
        jQuery(document).ready(function ($) {
            $(\".scroll\").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        }); addEventListener(\"load\", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
        $(\"span.menu\").click(function () {
            $(\".top-nav ul\").slideToggle(200);
        });
") ?>
<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */
\yii\bootstrap\BootstrapPluginAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="bgl2 col-lg-12 col-sm-12 col-md-12">
    <div class="container col-lg-12 col-sm-12 col-md-12">
        <div id="home" class="header wow bounceInDown" data - wow - delay="0.4s">
            <div class="top-header">
                <div class=" col-sm-4 logo wow bounceInDown" data - wow - delay="0.4s">

                    <a href="#"><?= Html::img(\yii\helpers\Url::base() . '/theme/images/logo4.png', ['alt' => 'logo']) ?> </a>
                </div>
                 <nav class="top-nav wow bounceInDown" data - wow - delay="0.4s">
                    <ul class="top-nav">
                        <li class="active" ><?= Html::a('Inicio',['index']) ?></li>
                        <li><a href="#">Quienes somos <span class="caret"></span></a>
                            <ul>
                                <li style="font-size: small"><?= Html::a('Acerca de',Url::to(['/site/mision'])) ?></li>
                                <li style="font-size: small"><?= Html::a('Objeto social',Url::to(['/site/objetosocial'])) ?></li>
                                <li style="font-size: small"><?= Html::a('Pol. de Calidad',Url::to(['/site/politicas'])) ?></a></li>
                            </ul>
                        </li>
                        <li><a href="">Galeria <span class="caret"></span></a>
                            <ul>
                                <li style="font-size: small"><?= Html::a('Catalogo',Url::to(['/site/catalogo'])) ?></li>
                                <li style="font-size: small"><?= Html::a('Fotos','https://www.dropbox.com/sh/yu74pvzr3i1eh6h/AAB97Ol5Y-or4yHVZKqYGNMra?dl=0',['class'=>'youtube','target'=>'_blanck']) ?></li>
                                <li style="font-size: small"><?= Html::a('Youtube','https://www.youtube.com/channel/UCV-V0f5m4otn3g3bal1WMqQ',['class'=>'youtube','target'=>'_blanck'])?></li>
                            </ul>
                        </li>
                        <li><?= Html::a('Noticias',['site/noticias']) ?></li>
                        <li><?= Html::a('Contactenos',Url::to(['/site/contact'])) ?></a></li>
                    </ul>
                </nav>
                <div id="fotos" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#fotos" data-slide-to="0" class="active"></li>
                    <li data-target="#fotos" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                    <?=Html::img(\yii\helpers\Url::base() . '/theme/images/road4.jpg') ?>
                        <div class="carousel-caption">

                        </div>
                    </div>
                    <div class="item">
                    <?=Html::img(\yii\helpers\Url::base() . '/theme/images/p1.jpg') ?>
                        <div class="carousel-caption">

                        </div>
                    </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#fotos" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#fotos" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div> <!-- Carousel -->
                            <div class="clearfix"></div>
            </div>
            </div>
        </div>
    </div>
    <div class="banner text-right">
        <div class="container">
            <br/><br/><br/><br/><br/><br/><br/><br/>
            <h2 style="color: #ffffff; text-transform: uppercase">ASFALTO LISTO PARA USAR</h2>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="container">
    <?php if (($msm = Yii::$app->session->getAllFlashes()) !== null): ?>
        <?php foreach ($msm as $type => $menssage): ?>
            <div class="alert alert-<?php echo $type ?> fade in">
                <button data-dismiss="alert" class="close" type="button">
                    <i class="glyphicon glyphicon-remove"></i>
                </button><?php echo $menssage ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<div class="bottom-grids">
    <div class="container">
        <?= $content ?>
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-2 footer-grid ftr-sec wow fadeInLeft" data-wow-delay="0.4s">
                <h3>Navegacion</h3>
                <ul>
                    <li><?= Html::a('Inicio',['index']) ?></li>
                    <li><?= Html::a('Noticias',['site/noticias']) ?></li>
                    <li><?= Html::a('Contactenos',Url::to(['/site/contact'])) ?></a></li>
                    <li><?= Html::a('Intranet',['/site/login']) ?></li>
                </ul>
            </div>

            <div class="col-md-2 footer-grid ftr-sec wow fadeInRight" data-wow-delay="0.4s">
                <h3>Siguenos</h3>
                <ul class="social-icons">
                    <li><?= Html::a('Facebook','https://facebook.com/ofigres',['class'=>'facebook','target'=>'_blanck']) ?></li>
                    <li><?= Html::a('Youtube','https://www.youtube.com/channel/UCV-V0f5m4otn3g3bal1WMqQ',['class'=>'youtube','target'=>'_blanck']) ?></li>
                </ul>
            </div>
            <div class="col-md-5 footer-grid ftr-sec ftr wow fadeInRight" data-wow-delay="0.4s">
                <h3>Nuestra Ubicacion</h3>
                <ul class="location">
                    <li><a href="#" class="hm"><span></span>Dirección: AVENIDA 6AE N° 10-111 BARRIO LA RIVIERA.</a></li>
                    <li><a href="#" class="phn"><span></span>Email : contacto@ofigres.com</a></li>
                    <li><a href="#" class="phn"><span></span>Telf.: 5 5776984 Cel.: 3115279656-3115267518</a></li>

                </ul>
            </div>
            <div class="col-md-3 footer-grid ftr-sec ftr wow fadeInRight" data-wow-delay="0.4s">
                <?= Html::img(\yii\helpers\Url::base() . '/theme/images/logoofigres.png', ['class'=>'img-responsive']) ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <p class="copy-right wow bounceInRight" data-wow-delay="0.4s"> <?= date('Y') ?> &copy; Design by <a
                href="#">GreenSoftw</a></p>
    </div>
</div>
<?php /*$this->registerJsFile('@web/js/bg.js',[
    'depends'=>[\yii\web\JqueryAsset::className()],
    'position'=>\yii\web\View::POS_END
]) */?>
<?php $this->endBody() ?>


</body>
</html>
<?php $this->endPage() ?>


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
<div class="col-md-12" style="background-color: #0097cf">
    <div class="top-header">
        <nav class="top-nav wow bounceInDown" data - wow - delay="0.4s">
            <span class="menu"> </span>
            <ul class="nav nav-tabs">
                <li class="active"><?= Html::a('Inicio',['/site/index']) ?></li>
                <li><?= Html::a('Crear Noticias', ['noticias/index']) ?></li>
                <li><?= Html::a('Admin Noticias',['noticias/admin']) ?></li>
                <li><?= Html::a('Crear Productos',['producto/index']) ?></li>
                <li><?= Html::a('Admin Productos',['producto/admin']) ?></li>
                <li><?= Html::a('Usuario',['usuario/admin']) ?></li>
                <li><?= Html::a('Salir',['/site/logout'],['data-method' => 'post']) ?></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </div>
</div>
<br/><br/><br/>
<div class="bottom-grids">
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
    <div class="container">
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


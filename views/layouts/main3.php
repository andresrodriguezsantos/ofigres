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
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Ofigres.com',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-static-top',
        ]
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right pull-right', 'style' => 'margin-top: 2%;'],
        'items' => [


            Yii::$app->user->can('Administrador') ?
                ['label' => 'Crear Noticias', 'url' => ['noticias/index']] : '',
            Yii::$app->user->can('Administrador') ?
                ['label' => 'Admin Noticia', 'url' => ['noticias/admin']] : '',
            Yii::$app->user->can('Administrador') ?
                ['label' => 'Crear Productos', 'url' => ['producto/index']] : '',
            Yii::$app->user->can('Administrador') ?
                ['label' => 'Admin Productos', 'url' => ['producto/admin']] : '',
            Yii::$app->user->can('Secretaria') ?
                ['label' => 'Crear Noticias', 'url' => ['noticias/index']] : '',
            Yii::$app->user->can('Secretaria') ?
                ['label' => 'Admin Noticia', 'url' => ['noticias/admin']] : '',
            Yii::$app->user->can('Secretaria') ?
                ['label' => 'Crear Productos', 'url' => ['producto/index']] : '',
            Yii::$app->user->can('Secretaria') ?
                ['label' => 'Admin Productos', 'url' => ['producto/admin']] : '',
            Yii::$app->user->can('Gerente') ?
                ['label' => 'Usuario', 'url' => ['usuario/admin']] : '',
            Yii::$app->user->isGuest ?
                ['label' => 'Ingresar', 'url' => ['/site/login']] :
                ['label' => 'Salir (' . Yii::$app->user->identity->nombres . ')',
                    'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
        ],
    ]);
    NavBar::end();
    ?>
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


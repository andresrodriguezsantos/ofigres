<?php
use yii\helpers\Html;
$this->title = 'Misión y visión';
?>
<div class="container">
    <div class="best-seller" style="overflow: hidden;">
        <div class="biseller-info" style="overflow: hidden;">
            <div class="col-md-12">
                <div class="col-md-6">
                    <h2 align="center">Mision</h2>
                    <p style="text-align:justify">
                        Ofigres es una empresa privada que busca satisfacer las necesidades y expectativas del sector de la construcción e infraestructura,
                        ofreciendo   productos asfalticos y otros de la gama de la construcción de alta calidad. Hace parte del portafolio la ejecución
                        de proyectos de ingeniería civil, y mantenimiento de malla vial,  adquiriendo un  compromiso total de los propietarios y
                        recurso humano (empleados) con la comunidad y el medio ambiente, garantizando la rentabilidad de los activos invertidos y
                        el retorno del capital en el menor tiempo posible.
                    </p>
                </div>
                <div class="col-md-6">
                    <?= Html::img(\yii\helpers\Url::base() . '/theme/images/mision1.jpg', ['class'=>'img-responsive','style' => 'margin: 0 auto; max-width:50%']) ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <?= Html::img(\yii\helpers\Url::base() . '/theme/images/vision1.jpg', ['class'=>'img-responsive','style' => 'margin: 0 auto; max-width:50%']) ?>
                </div>
                <div class="col-md-6">
                    <h2 align="center">Vision</h2>
                    <p style="text-align:justify">
                        Lograr en el año 2020 el liderazgo nacional como una empresa de vanguardia en la  comercialización de productos asfalticos de calidad
                        para la recuperación de vías primarias y secundarias, superando las expectativas de nuestros clientes, proyectándonos como una empresa
                        productiva y competitiva que aporte para el crecimiento y desarrollo económico de la región.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
/* @var array $btn */
/* @var array $url*/
use yii\bootstrap\Modal;
use yii\helpers\Html;

    Modal::begin([
    'header' => '<h3 style="color: #b81900">Desea Eliminar la Informacion ? </h3>',
    'toggleButton' => $btn,
    'footer'=>Html::a('borrar',$url,['class'=>'btn btn-primary btn-lg','data-method' => 'post']).
        Html::button('cancelar',['data-dismiss'=>'modal','class'=>'btn btn-warning btn-lg'])
]);?>
    <h3>La informacion sera eliminada permanentemente del sistema</h3>
<?php
Modal::end();
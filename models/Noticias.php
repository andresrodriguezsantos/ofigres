<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticias".
 *
 * @property string $id
 * @property string $titulo
 * @property string $cuerpo
 * @property string $urlimg
 * @property string $piedefoto
 * @property string $fecha
 * @property integer $estado
 */
class Noticias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $picture;
    public static function tableName()
    {
        return 'noticias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['picture'], 'file','extensions' => 'jpg, jpeg, png','skipOnEmpty'  =>  false,'on'=>'insert'],
            [['titulo', 'cuerpo', 'urlimg', 'piedefoto'], 'required'],
            [['fecha'], 'safe'],
            [['estado'], 'integer'],
            [['titulo'], 'string', 'max' => 250],
            [['cuerpo'], 'string', 'max' => 1000],
            [['urlimg', 'piedefoto'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'cuerpo' => 'Cuerpo',
            'urlimg' => 'Seleccione una Imagen',
            'piedefoto' => 'Pie de foto',
            'fecha' => 'Fecha',
            'estado' => 'Estado de Visibilidad al Publico',
            'picture'=>'Seleccione una Imagen'
        ];
    }
}

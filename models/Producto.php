<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property string $id
 * @property string $descripicion
 * @property string $medida
 * @property string $nota
 * @property string $urlimg
 * @property integer $estado
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $picture;
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['picture'], 'file','skipOnEmpty' =>false,'on'=>'insert','extensions'=>'jpg, png'],
            [['picture'], 'file','skipOnEmpty' =>true,'on'=>'update','extensions'=>'jpg, png'],
            [['descripicion', 'urlimg'], 'required'],
            [['estado'], 'integer'],
            [['descripicion', 'medida', 'nota', 'urlimg'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripicion' => 'Descripcion',
            'medida' => 'Medida',
            'nota' => 'Nota',
            'urlimg' => 'Seleccione una Imagen',
            'estado' => 'Estado de Visibilidad al Publico',
        ];
    }

    public function getImageurl()
    {
        return \Yii::$app->request->BaseUrl.'/'.$this->urlimg;
    }

}

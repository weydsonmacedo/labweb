<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "armamento".
 *
 * @property integer $numero_serie
 * @property string $fabricante
 * @property integer $id_material
 *
 * @property Material $idMaterial
 */
class Armamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'armamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero_serie', 'fabricante'], 'required'],
            [['numero_serie', 'id_material'], 'integer'],
            [['fabricante'], 'string', 'max' => 50],
            [['id_material'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['id_material' => 'id_material']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'numero_serie' => 'Numero Serie',
            'fabricante' => 'Fabricante',
            'id_material' => 'Id Material',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMaterial()
    {
        return $this->hasOne(Material::className(), ['id_material' => 'id_material']);
    }
}

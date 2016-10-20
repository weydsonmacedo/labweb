<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "municao".
 *
 * @property integer $id_material
 * @property string $calibre
 *
 * @property Material $idMaterial
 */
class Municao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_material'], 'integer'],
            [['calibre'], 'string', 'max' => 50],
            [['id_material'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['id_material' => 'id_material']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_material' => 'Id Material',
            'calibre' => 'Calibre',
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

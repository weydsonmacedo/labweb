<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acessorio".
 *
 * @property integer $id_material
 *
 * @property Material $idMaterial
 */
class Acessorio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acessorio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_material'], 'integer'],
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

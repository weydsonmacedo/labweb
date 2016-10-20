<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva_material".
 *
 * @property integer $id_reserva
 * @property integer $id_material
 * @property integer $quantidade
 *
 * @property Reserva $idReserva
 * @property Material $idMaterial
 */
class ReservaMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserva_material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_reserva', 'id_material', 'quantidade'], 'required'],
            [['id_reserva', 'id_material', 'quantidade'], 'integer'],
            [['id_reserva'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::className(), 'targetAttribute' => ['id_reserva' => 'id_reserva']],
            [['id_material'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['id_material' => 'id_material']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_reserva' => 'Id Reserva',
            'id_material' => 'Id Material',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdReserva()
    {
        return $this->hasOne(Reserva::className(), ['id_reserva' => 'id_reserva']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMaterial()
    {
        return $this->hasOne(Material::className(), ['id_material' => 'id_material']);
    }
}

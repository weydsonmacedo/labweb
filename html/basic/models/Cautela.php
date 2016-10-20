<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cautela".
 *
 * @property integer $id_cautela
 * @property integer $id_reserva
 * @property integer $id_cabo_armeiro
 * @property integer $id_militar
 * @property integer $id_material
 * @property integer $quantidade
 *
 * @property Militar $idMilitar
 * @property Reserva $idReserva
 * @property CaboArmeiro $idCaboArmeiro
 */
class Cautela extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cautela';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cautela'], 'required'],
            [['id_cautela', 'id_reserva', 'id_cabo_armeiro', 'id_militar', 'id_material', 'quantidade'], 'integer'],
            [['id_militar'], 'exist', 'skipOnError' => true, 'targetClass' => Militar::className(), 'targetAttribute' => ['id_militar' => 'id_militar']],
            [['id_reserva'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::className(), 'targetAttribute' => ['id_reserva' => 'id_reserva']],
            [['id_cabo_armeiro'], 'exist', 'skipOnError' => true, 'targetClass' => CaboArmeiro::className(), 'targetAttribute' => ['id_cabo_armeiro' => 'idusuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cautela' => 'Id Cautela',
            'id_reserva' => 'Id Reserva',
            'id_cabo_armeiro' => 'Id Cabo Armeiro',
            'id_militar' => 'Id Militar',
            'id_material' => 'Id Material',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMilitar()
    {
        return $this->hasOne(Militar::className(), ['id_militar' => 'id_militar']);
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
    public function getIdCaboArmeiro()
    {
        return $this->hasOne(CaboArmeiro::className(), ['idusuario' => 'id_cabo_armeiro']);
    }
}

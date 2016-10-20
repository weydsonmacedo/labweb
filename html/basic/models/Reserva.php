<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property integer $id_reserva
 * @property string $sigla
 * @property string $descricao
 *
 * @property Cautela[] $cautelas
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_reserva', 'sigla', 'descricao'], 'required'],
            [['id_reserva'], 'integer'],
            [['sigla', 'descricao'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_reserva' => 'Id Reserva',
            'sigla' => 'Sigla',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCautelas()
    {
        return $this->hasMany(Cautela::className(), ['id_reserva' => 'id_reserva']);
    }
}

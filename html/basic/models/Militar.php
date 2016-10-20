<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "militar".
 *
 * @property integer $id_militar
 * @property string $posto_graduacao
 * @property string $nome_guerra
 *
 * @property Cautela[] $cautelas
 */
class Militar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'militar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_militar'], 'required'],
            [['id_militar'], 'integer'],
            [['posto_graduacao', 'nome_guerra'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_militar' => 'Id Militar',
            'posto_graduacao' => 'Posto Graduacao',
            'nome_guerra' => 'Nome Guerra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCautelas()
    {
        return $this->hasMany(Cautela::className(), ['id_militar' => 'id_militar']);
    }
}

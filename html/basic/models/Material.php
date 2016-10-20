<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property integer $id_material
 * @property string $descricao_modelo
 * @property string $tipo
 *
 * @property Acessorio[] $acessorios
 * @property Armamento[] $armamentos
 * @property Municao[] $municaos
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_material'], 'required'],
            [['id_material'], 'integer'],
            [['descricao_modelo'], 'string', 'max' => 50],
            [['tipo'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_material' => 'Id Material',
            'descricao_modelo' => 'Descricao Modelo',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcessorios()
    {
        return $this->hasMany(Acessorio::className(), ['id_material' => 'id_material']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArmamentos()
    {
        return $this->hasMany(Armamento::className(), ['id_material' => 'id_material']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicaos()
    {
        return $this->hasMany(Municao::className(), ['id_material' => 'id_material']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cabo_armeiro".
 *
 * @property integer $idusuario
 * @property string $nome_completo
 * @property string $login
 * @property string $senha
 * @property string $email
 *
 * @property Cautela[] $cautelas
 */
class CaboArmeiro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cabo_armeiro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idusuario', 'nome_completo', 'login', 'senha', 'email'], 'required'],
            [['idusuario'], 'integer'],
            [['nome_completo', 'email'], 'string', 'max' => 50],
            [['login'], 'string', 'max' => 45],
            [['senha'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => 'Idusuario',
            'nome_completo' => 'Nome Completo',
            'login' => 'Login',
            'senha' => 'Senha',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCautelas()
    {
        return $this->hasMany(Cautela::className(), ['id_cabo_armeiro' => 'idusuario']);
    }
}

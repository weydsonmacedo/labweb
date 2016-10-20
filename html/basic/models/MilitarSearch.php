<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Militar;

/**
 * MilitarSearch represents the model behind the search form about `app\models\Militar`.
 */
class MilitarSearch extends Militar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_militar'], 'integer'],
            [['posto_graduacao', 'nome_guerra'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Militar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_militar' => $this->id_militar,
        ]);

        $query->andFilterWhere(['like', 'posto_graduacao', $this->posto_graduacao])
            ->andFilterWhere(['like', 'nome_guerra', $this->nome_guerra]);

        return $dataProvider;
    }
}

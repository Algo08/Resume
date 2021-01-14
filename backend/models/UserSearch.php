<?php

namespace backend\models;

use common\models\User;
use yii\data\ActiveDataProvider;

/**
 * BTDOCUMENTSSearch represents the model behind the search form of `app\models\BTDocuments\BTDOCUMENTS`.
 */
class UserSearch extends User
{


    public function rules() {
        return [
            [['firstname', 'lastname', 'username', 'email', 'region', 'telegram_username'], 'safe'],
        ];
    }


    public function search($params) {
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['firstname', 'lastname', 'username', 'email', 'region', 'telegram_username']]
        ]);

        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'email' => $this->email,
            'telegram_username' => $this->telegram_username,
            'region' => $this->region,
        ]);

        $query->andFilterWhere(['firstname'=> $this->firstname])
            ->andFilterWhere(['lastname'=> $this->lastname])
            ->andFilterWhere(['username'=> $this->username])
            ->andFilterWhere(['email'=> $this->email])
            ->andFilterWhere(['telegram_username'=> $this->telegram_username])
            ->andFilterWhere(['region'=> $this->region]);

        return $dataProvider;
    }

}

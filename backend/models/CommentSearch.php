<?php

namespace backend\models;

use common\models\Comments;
use yii\data\ActiveDataProvider;

/**
 * BTDOCUMENTSSearch represents the model behind the search form of `app\models\BTDocuments\BTDOCUMENTS`.
 */
class CommentSearch extends Comments
{


    public function rules() {
        return [
            [['text'], 'safe'],
        ];
    }


    public function search($params) {
        $query = Comments::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['text']]
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
            'text' => $this->text,
        ]);

        $query->andFilterWhere(['text'=> $this->text]);

        return $dataProvider;
    }

}

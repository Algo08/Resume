<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ishchilar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ishchi qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options'=>[
                'class'=>'table-responsive'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'full_name',
            'date_of_birth:date',
            'nation',
            [
                'attribute' => 'data',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::ul(json_decode($data['data'],true),['class' => 'list-group','itemOptions' => ['class' => 'list-group-item']]);
                },
            ],

            'phone',
            'email:email',
            //'places_of_work:ntext',
            [
                'attribute' => 'image_location',
                'format' => 'html',
                'contentOptions'=>['class'=> 'text-center', 'style'=>'width: 220px'],
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web'). $data['image_location'],
                        ['width' => '100px', 'style'=>['background-color'=>'#393939']]);
                },
            ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions'=>['class'=> 'text-center', 'style'=>'width: 160px'],
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return Html::a('<i class="fa fa-print mx-1"></i>',\yii\helpers\Url::to(['view','id'=>$model->id]),
                            ['class' => 'view']);
                    },
                    'update'=>function ($url, $model) {
                        return Html::a( '<i class="fa fa-pencil-alt mx-1"></i>',\yii\helpers\Url::to(['update','id'=>$model->id]),
                            ['class' => 'update'] );
                    },
                    'delete'=>function ($url, $model) {
                        return Html::a( '<i class="fa fa-trash mx-1"></i>',\yii\helpers\Url::to(['delete','id'=>$model->id]),
                            ['class' => 'delete', 'data-key'=>$model->id,
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ] );
                    }
                ],
            ],
        ],
    ]); ?>


</div>

<?php

use borales\extensions\phoneInput\PhoneInput;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row mb-4">
        <?= $form->field($model, 'full_name',['options'=>['class'=>'col']])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'date_of_birth',['options'=>['class'=>'col']])->widget(DatePicker::classname(), [
            'name' => 'check_issue_date',
            'value' => date('d-M-Y', strtotime('+2 days')),
            'options' => ['placeholder' => 'Select issue date ...'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ]); ?>

        <?= $form->field($model, 'nation',['options'=>['class'=>'col']])->textInput() ?>
    </div>

    <div class="row mb-4">
        <?=$form->field($model, 'phone',['options'=>['class'=>'col-6']])->widget(PhoneInput::className(), [
            'jsOptions' => [
                'preferredCountries' => ['uz', 'ru', 's', 'gb'],
            ]
        ])?>
        <?= $form->field($model, 'email',['options'=>['class'=>'col-6']])->textInput(['maxlength' => true]) ?>
    </div>

    <div class="row mb-4">
        <div class="col-6">
            <div class="work-div">
                <?php
                if ($model->places_of_work){
                    foreach (json_decode($model->places_of_work,true) as $keyWork=>$item):
                        echo $form->field($model, 'work['.($keyWork).']', ['labelOptions' => ['label' => ($keyWork).'-qayerda ishlagan']])->textarea(['maxlength' => true,'value'=>$item]);
                    endforeach;
                }
                else{
                    $keyWork=1;
                    echo $form->field($model, 'work[1]', ['labelOptions' => ['label' => '1-qayerda ishlagan']])->textarea(['maxlength' => true]);
                }
                ?>
            </div>
            <?=Html::button('yana ish qo`shish',['class'=>'btn btn-success work-plus col-12','data-key'=>$keyWork+1])?>
        </div>

        <div class="col-6">
            <div class="data-div">
                <?php
                if ($model->data){
                    foreach (json_decode($model->data,true) as $keyData=>$item):
                        echo $form->field($model, 'config['.($keyData).']', ['labelOptions' => ['label' => ($keyData).'-ma`lumot']])->textarea(['maxlength' => true,'value'=>$item]);
                    endforeach;
                }
                else{
                    $keyData=1;
                    echo $form->field($model, 'config[1]', ['labelOptions' => ['label' => '1-ma`lumot']])->textarea(['maxlength' => true]);
                }
                ?>
            </div>

            <?=Html::button('yana ma`lumot qo`shish',['class'=>'btn btn-success data-plus col-12','data-key'=>$keyData+1])?>
        </div>
    </div>


    <div class="text-center mt-3">
        <?=$form->field($model, 'imageFile')
            ->widget(\fv\yii\croppie\Widget::class,
                [
                    'format' => 'jpeg',
                    'clientOptions' => [
                        'viewport'=>[
                            'width'=>250,
                            'height' => 250,
                        ],
                        'boundary'=>[
                            'width'=>300,
                            'height' => 300
                        ],
                    ],
                    'rotateCcwLabel' => '<i class="icon-undo"></i> 90&deg',
                    'rotateCwLabel' => '<i class="icon-rotate-right"></i> 90&deg',
                    'uploadButtonOptions' => [
                        'value'=>'test',
                    ],
                ])
            ->label(false);?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
$script = <<< JS

var dataBtn = $('.data-plus');
var workBtn = $('.work-plus');
var dataDiv = $('.data-div');
var workDiv = $('.work-div');
$(document).ready(function () {
    dataBtn.click(function (event){
        event.preventDefault();
        dataId = dataBtn.data('key');
        data = '<div class="form-group field-staff-config-'+dataId+'"><label for="staff-config-'+dataId+'">'+dataId+'-ma`lumot</label><textarea id="staff-config-'+dataId+'" class="form-control" name="Staff[config]['+dataId+']"></textarea><div class="help-block"></div></div>'
        dataDiv.append(data);
        dataBtn.data('key',dataId+1);
    })
    
    workBtn.click(function (event){
        event.preventDefault();
        workId = workBtn.data('key');
        work = '<div class="form-group field-staff-work-'+workId+'"><label for="staff-work-'+workId+'">'+workId+'-Ishlagan joyi</label><textarea id="staff-work-'+workId+'" class="form-control" name="Staff[work]['+workId+']"></textarea><div class="help-block"></div></div>'
        workDiv.append(work);
        workBtn.data('key',workId+1);
    })
})      
JS;
$this->registerJs( $script );
?>
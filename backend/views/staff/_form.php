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
        <div class="col-lg-8">
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'date_of_birth')->widget(DatePicker::classname(), [
                'name' => 'check_issue_date',
                'value' => date('d-M-Y', strtotime('+2 days')),
                'options' => ['placeholder' => 'Sanani tanlang...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]); ?>

            <?= $form->field($model, 'nation')->textInput() ?>
            <?=$form->field($model, 'phone')->widget(PhoneInput::className(), [
                'defaultOptions'=> ['maxlength'=>15],
                'jsOptions' => [
                    'preferredCountries' => ['uz', 'ru', 's', 'gb'],
                ]
            ])?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?=$form->field($model, 'imageFile',['options'=>['class'=>'text-center']])
                ->widget(\fv\yii\croppie\Widget::class,
                    [
                        'format' => 'jpeg',
                        'clientOptions' => [
                            'viewport'=>[
                                'width'=>250,
                                'height' => 250,
                            ],
                            'boundary'=>[
                                'width'=>250,
                                'height' => 250
                            ],
                             'url' => \yii\helpers\Url::to('@web'.$model->image_location)
                        ],
                        'rotateCcwLabel' => '<i class="icon-undo"></i> 90&deg',
                        'rotateCwLabel' => '<i class="icon-rotate-right"></i> 90&deg',
                        'uploadButtonOptions' => [
                            'value'=>'Yuklash',
                        ],
                    ])
                ->label(false);?>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-6 border py-2 rounded">
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
            <?=Html::button('<i class="fas fa-plus"></i>',['class'=>'btn btn-success work-plus float-right','data-key'=>$keyWork+1])?>
            <?=Html::button('<i class="fas fa-minus"></i>',['class'=>'btn btn-success work-minus mr-2 float-right'])?>
        </div>

        <div class="col-lg-6 border py-2 rounded">
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

            <?=Html::button('<i class="fas fa-plus"></i>',['class'=>'btn btn-success data-plus float-right','data-key'=>$keyData+1])?>
            <?=Html::button('<i class="fas fa-minus"></i>',['class'=>'btn btn-success data-minus mr-2 float-right'])?>

        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
$script = <<< JS

var dataBtn = $('.data-plus');
var dataMinusBtn = $('.data-minus');
var workBtn = $('.work-plus');
var workMinusBtn = $('.work-minus');
var dataDiv = $('.data-div');
var workDiv = $('.work-div');
$(document).ready(function () {
    
    dataBtn.click(function (event){
        event.preventDefault();
        dataId = $(this).attr('data-key');
        data = '<div class="form-group field-staff-config-'+dataId+'"><label for="staff-config-'+dataId+'">'+dataId+'-ma`lumot</label><textarea id="staff-config-'+dataId+'" class="form-control" name="Staff[config]['+dataId+']"></textarea><div class="help-block"></div></div>'
        dataDiv.append(data);
        dataId++;   
        $(this).attr('data-key',dataId);
    })
    dataMinusBtn.click(function (event){
        event.preventDefault();
        $(".data-div .form-group").last().remove();
        dataBtn.attr('data-key',dataBtn.attr('data-key')-1);    
    })
    
    workBtn.click(function (event){
        event.preventDefault();
        workId = $(this).attr('data-key');
        work = '<div class="form-group field-staff-work-'+workId+'"><label for="staff-work-'+workId+'">'+workId+'-Ishlagan joyi</label><textarea id="staff-work-'+workId+'" class="form-control" name="Staff[work]['+workId+']"></textarea><div class="help-block"></div></div>'
        workDiv.append(work);
        workId++;
        $(this).attr('data-key',workId);
    })
    
    workMinusBtn.click(function (event){
        event.preventDefault();
        $(".work-div .form-group").last().remove();
        workBtn.attr('data-key',workBtn.attr('data-key')-1);    
    })
})      
JS;
$this->registerJs( $script );
?>
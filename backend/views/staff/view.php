<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */

$this->title = $model->full_name.' resume';
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<link href="/resume/css/resume.css" rel="stylesheet">



    <!-- Header -->
    <header class="header pull-left">

        <div class="avatar">
            <img src="<?=\yii\helpers\Url::to('@web'.$model->image_location)?>" alt="avatar">
        </div>

        <div class="name">
            <h1><?=$model->full_name?></h1>
            <span>Staff</span>
        </div>




    </header>
    <!-- Header end -->

    <!-- Main Content -->
    <div class="main-content pull-right">


        <!-- Section About -->
        <section id="about" class="about">

            <div class="section-header">
                <h2>Resume</h2>
            </div>

            <!-- Intro -->
            <div class="intro">

                <ul class="info">
                    <li><strong>FISH</strong> <?=$model->full_name?></li>
                    <li><strong>Tu'gulgan sana</strong> <?=date('F d, Y',strtotime($model->date_of_birth))?></li>
                    <li><strong>Millati:</strong> <?=$model->nation?></li>
                    <li><strong>Email:</strong> <?=$model->email?></li>
                    <li><strong>Tel nomeri:</strong> <?=$model->phone?></li>
                </ul>

                <div class="section-header">
                    <h2>Malumotlar</h2>
                </div>
                <?=Html::ul(json_decode($model->data,true),['class' => 'list-group','itemOptions' => ['class' => 'list-group-item']])?>

                <div class="section-header">
                    <h2>Ishlagan joylari</h2>
                </div>
                <?=Html::ul(json_decode($model->places_of_work,true),['class' => 'list-group','itemOptions' => ['class' => 'list-group-item']])?>
            </div>
            <!-- Intro end -->

        </section>
        <!-- Section About end -->


    </div>

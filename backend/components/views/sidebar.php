<?php
//$telegram = Yii::$app->telegram;
//$res = $telegram->sendMessage([
//    'chat_id' => 114695203,
//    'text' => "salam"
//]);?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= Yii::$app->homeUrl?>">
        <div class="sidebar-brand-icon">
            Resume
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Asosiy
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?=\yii\helpers\Url::to('@web/staff')?>">
            <i class="fas fa-fw fa-users"></i>
            <span>People</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

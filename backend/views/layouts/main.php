<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php $this->endBody() ?>

</head>
<body id="page-top">
<?php $this->beginBody() ?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo app\components\Sidebar::widget()?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php echo app\components\Toolbar::widget()?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
            <!-- End of Page Content -->
        </div>

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
</div>


<script src="<?=\yii\helpers\Url::to('@web/theme/js/sb-admin-2.min.js')?>"></script>
<script src="<?=\yii\helpers\Url::to('@web/theme/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?=\yii\helpers\Url::to('@web/theme/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
</body>
</html>
<?php $this->endPage() ?>

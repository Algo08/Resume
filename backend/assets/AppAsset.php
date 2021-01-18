<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/vendor/fontawesome-free/css/all.min.css',
        'theme/css/sb-admin-2.min.css',
        'css/site.css',
//        'css/resume.css'
    ];
    public $js = [
//        'theme/js/sb-admin-2.min.js',
//        'theme/vendor/bootstrap/js/bootstrap.bundle.min.js',
//        'theme/vendor/chart.js/Chart.min.js',
//        'theme/vendor/jquery-easing/jquery.easing.min.js',
//        'theme/js/demo/chart-area-demo.js',
//        'theme/js/demo/chart-bar-demo.js',
//        'theme/js/demo/chart-pie-demo.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}

<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'template/plugins/fontawesome-free/css/all.min.css',
        'template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
        'template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
        'template/plugins/toastr/toastr.min.css',
        'template/dist/css/adminlte.min.css',
    ];
    public $js = [
        'template/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        'template/dist/js/adminlte.js',
        'template/dist/js/demo.js',
        'template/plugins/jquery-mousewheel/jquery.mousewheel.js',
        'template/plugins/raphael/raphael.min.js',
        'template/plugins/jquery-mapael/jquery.mapael.min.js',
        'template/plugins/jquery-mapael/maps/usa_states.min.js',
        'template/dist/js/pages/dashboard2.js',
        'template/plugins/sweetalert2/sweetalert2.min.js',
        'template/plugins/toastr/toastr.min.js',
        'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js',
        'vuejs/vue.min.js',
    ];
    public $depends = [
        'app\assets\JqueryAsset',
    ];
}

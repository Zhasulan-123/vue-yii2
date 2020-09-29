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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'template/plugins/fontawesome-free/css/all.min.css',
        'template/dist/css/adminlte.min.css',
        'template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
        'template/plugins/toastr/toastr.min.css',
    ];
    public $js = [
        'template/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'template/dist/js/adminlte.min.js',
        'template/plugins/sweetalert2/sweetalert2.min.js',
        'template/plugins/toastr/toastr.min.js',
        'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js',
        'vuejs/vue.min.js',
    ];
    public $depends = [
        'app\assets\JqueryAsset',
    ];
}

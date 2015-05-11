<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'theme/css/animate.css',
        'theme/css/style.css',
        'theme/css/swipebox.css'
    ];
    public $js = [
        'theme/js/flexmenu.min.js',
        'theme/js/ios-orientationchange-fix.min.js',
        'theme/js/jquery.flexisel.js',
        'theme/js/jquery.mixitup.min.js',
        'theme/js/jquery.swipebox.min.js',
        'theme/js/modernizr.custom.js',
        'theme/js/wow.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

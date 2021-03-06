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
        'css/site.css',
        'http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/styles/default.min.css',
    ];
    public $js = [
    				'js/sidebar.js',
    				'http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js',
    			];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

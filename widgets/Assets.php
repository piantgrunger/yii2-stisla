<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace app\widgets;
use yii\web\AssetBundle;
use yii\web\View;
/**
 * Asset bundle for the Twitter bootstrap javascript files.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Assets extends AssetBundle
{
    public $sourcePath = '@app/widgets/Assets.php';
    public $css = [
        'style.css',
    ];
    public $js = [
    ];
    public $jsOptions = [
        // 'position' => View::POS_HEAD, 
    ];
    /*
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    */
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


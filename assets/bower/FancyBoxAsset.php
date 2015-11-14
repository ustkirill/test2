<?php

namespace app\assets\bower;

use yii\web\AssetBundle;

class FancyBoxAsset extends AssetBundle
{
    public $sourcePath = "@app/vendor/bower/fancybox/source";
    
    public $css = [
    	'jquery.fancybox.css'
    ];
    
    public $js = [
        'jquery.fancybox.js'
    ];
}

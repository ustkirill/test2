<?php

namespace app\assets\bower;

use yii\web\AssetBundle;

class MomentAsset extends AssetBundle
{
    public $sourcePath = "@app/vendor/moment/moment";
    
    public $css = [
    ];
    
    public $js = [
        'min/moment.min.js',
        'min/moment-with-locales.min.js'
    ];
}

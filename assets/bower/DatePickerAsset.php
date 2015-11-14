<?php

namespace app\assets\bower;

use yii\web\AssetBundle;

class DatePickerAsset extends AssetBundle
{
    public $sourcePath = "@app/vendor/eonasdan/bootstrap-datetimepicker/build";
    
    public $css = [
        'css/bootstrap-datetimepicker.min.css'
    ];
    
    public $js = [
        'js/bootstrap-datetimepicker.min.js'
    ];
}

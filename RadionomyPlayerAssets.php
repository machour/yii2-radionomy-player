<?php

namespace machour\yii2\radionomy\player;

use yii\web\AssetBundle;

class RadionomyPlayerAssets extends AssetBundle
{
    public $sourcePath = '@vendor/bower/jquery-radionomy/';

    public $js = [
        'jquery.radionomy.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
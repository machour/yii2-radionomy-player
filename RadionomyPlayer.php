<?php

namespace machour\yii2\radionomy\player;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

class RadionomyPlayer extends Widget
{
    /**
     * @var string Your radio id
     */
    public $url;
    /**
     * @var string The layout type
     */
    public $type = 'horizontal';
    /**
     * @var int Whether to auto play the radio or not
     */
    public $autoplay = 0;
    /**
     * @var int The initial volume
     */
    public $volume = 50;
    /**
     * @var string Background color for radio overlays
     */
    public $color1 = '#f1ffc4';
    /**
     * @var string Foreground color for radio overlays
     */
    public $color2 = '#ff844f';

    /**
     * @var array Breakpoints to change types
     */
    public $breakpoints = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (is_null($this->url)) {
            throw new InvalidConfigException('The `url` parameter must be configured.');
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        RadionomyPlayerAssets::register($this->view);

        echo Html::tag('div', '', ['id' => $this->id]);

        ksort($this->breakpoints);

        $config = Json::encode([
            'url' => $this->url,
            'autoplay' => $this->autoplay,
            'type' => $this->type,
            'volume' => $this->volume,
            'color1' => $this->color1,
            'color2' => $this->color2,
        ]);

        $breakpoints = Json::encode($this->breakpoints);

        $this->view->registerJs("$('#$this->id').radionomy($config, $breakpoints);");
    }
}
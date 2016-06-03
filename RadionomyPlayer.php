<?php

namespace machour\yii2\radionomy\player;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;

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
        echo Html::tag('div', '', ['class' => 'radionomy-player']);
        echo Html::tag('script', <<<RAD
(function (win, doc, script, source, objectName) {
  (win.RadionomyPlayerObject = win.RadionomyPlayerObject || []).push(objectName);
  win[objectName] = win[objectName] || function (k, v) {
          (win[objectName].parameters = win[objectName].parameters || {
                  src: source,
                  version: '1.1'
              })[k] = v;
      };
  var js, rjs = doc.getElementsByTagName(script)[0];
  js = doc.createElement(script);
  js.async = 1;
  js.src = source;
  rjs.parentNode.insertBefore(js, rjs);
}(window, document, 'script', 'https://www.radionomy.com/js/radionomy.player.js', 'radplayer'));
radplayer('url', '{$this->url}');
radplayer('type', '{$this->type}');
radplayer('autoplay', '{$this->autoplay}');
radplayer('volume', '{$this->volume}');
radplayer('color1', '{$this->color1}');
radplayer('color2', '{$this->color2}');
RAD
        );
    }
}
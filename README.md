A Yii2 wrapper for the Radionomy player.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist machour/yii2-radionomy-player "*"
```

or add

```
"machour/yii2-radionomy-player": "*"
```

to the require section of your `composer.json` file.


Usage
-----

```php
<?= RadionomyPlayer::widget(['url' => 'your-radio-id']); ?>
```

Available Options
-----------------

| Name  | Description | Default value |
|---|---|---|
| url  | Your radio id | *(required)* |
| autoplay  | Whether to auto play the radio or not | 0 |
| volume  | Your radio id | *(required)* |
| type  | Layout type | horizontal |
| color1  | Background color for radio overlays | #f1ffc4 |
| color2  | Foreground color for radio overlays | #ff844f |

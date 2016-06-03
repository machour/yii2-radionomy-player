A Yii2 wrapper for the jquery-radionomy library.

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

This package will also install the [jquery-radionomy](https://github.com/machour/jquery-radionomy) bower package.


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
| type  | Layout type. Valid types are: horizontal / medium / mobile | horizontal |
| color1  | Background color for radio overlays | #f1ffc4 |
| color2  | Foreground color for radio overlays | #ff844f |
| breakpoints  | An array of width => type values. See explanations below. | [] |

Breakpoints
-----------

This library allow you to define breakpoints, which will be watched for when the window gets resized, in order to reload the player with an adequate layout.
In other words, you can give the player responsive behavior.

```php
<?= RadionomyPlayer::widget([
    'url' => 'your-radio-id',
    'breakpoints' => [
        400 => 'mobile',
        800 => 'medium',
        900 => 'horizontal',
]); ?>
```
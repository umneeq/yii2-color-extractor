Yii2 color extractor
====================
Extract colors from an image like a human would do. Based on [thephpleague/color-extractor](https://github.com/thephpleague/color-extractor)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist umneeq/yii2-color-extractor "*"
```

or add

```
"umneeq/yii2-color-extractor": "*"
```

to the require section of your `composer.json` file and run `composer update` command.


Usage
-----
> Notification. This extension accept 3 types of images: jpeg(jpg), png, gif

Once the extension is installed, simply use it in your code by:

```php
use \umneeq\colorextractor\ColorExtractor;

$imagePath = \Yii::getAlias('@frontend/web/img') . DIRECTORY_SEPARATOR . 'test.png';

// Get four most used color hex code
$result = ColorExtractor::extract($imagePath, 4);

// $result
[
    0 => '#F76C0F',
    1 => '#F0C67F',
    2 => '#AABBCC',
    3 => '#CCBBAA',
]
```
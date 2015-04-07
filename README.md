[![Build Status](https://travis-ci.org/thanhsm/mediaembed.svg?branch=master)](https://travis-ci.org/thanhsm/mediaembed)
[![Latest Stable Version](https://poser.pugx.org/thanhsm/mediaembed/v/stable.svg)](https://packagist.org/packages/thanhsm/mediaembed) [![Total Downloads](https://poser.pugx.org/thanhsm/mediaembed/downloads.svg)](https://packagist.org/packages/thanhsm/mediaembed) [![Latest Unstable Version](https://poser.pugx.org/thanhsm/mediaembed/v/unstable.svg)](https://packagist.org/packages/thanhsm/mediaembed) [![License](https://poser.pugx.org/thanhsm/mediaembed/license.svg)](https://packagist.org/packages/thanhsm/mediaembed)
# Media Embed
Mp3, NTC, Youtube media embed
# Installation
Add line
```json
"require": {
    "thanhsm/mediaembed": "dev-master"
  }
  ```
To composer.json in your project and then run ```composer update```

# How to use ?
Input:

```php
<?php
$input = 'Link here http://mp3.zing.vn/bai-hat/Vi-Ai-Vi-Anh-Dong-Nhi/ZW70UWO6.html';
```
Process content
```php
$content = new MediaEmbed($input);
or
$content = MediaEmbed::process($input);
```
Get get parsed content
```php
$contentProcessed = $content->getContent();
```
Example 
```http://youtube.com```  will become ```<a href="http://youtube.com">youtube.com</a>```

Check media object in content
```php
$content->hasMedia();
```
If contain media you can get media object with
```php
if ($content->hasMedia()) {
    $media = $content->getMediaProvider();
}
```
You can set media width/height simple by
```php
//pixel
$media->setWidth(200);
$media->setHeight(100);
or
$media->setSize(200, 100);
```
Get Media Size
```php
$media->getSize();
```
Get embed code (HTML)
```php
$media->getHTML();
```
Output
```xml
<iframe width="200" height="100" src="http://mp3.zing.vn/embed/song/ZW70UWO6?autostart=false" frameborder="0" allowfullscreen="true"></iframe>
```

Get all media data
```php
$data = $media->getData();
```
You also call with chaining method
```php
$data = $content->getMediaProvider()->getData()
```
Output
```php
$data = [
    'provider' => 'mp3',
    'embed_type' => 'song',
    'id' => ZW70UWO6,
    'html' => '<iframe width="200" height="100" src="http://mp3.zing.vn/embed/song/ZW70UWO6?autostart=false" frameborder="0" allowfullscreen="true"></iframe>',
    'with' => default width,
    'height' => default height
];
```
All issues please post to [here](https://github.com/thanhsm/mediaembed/issues), thanks you.

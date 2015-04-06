# Media Embed
Mp3, NTC, Youtube media embed

# How to use ?
Input:

```<?php
$content = 'Link here http://mp3.zing.vn/bai-hat/Vi-Ai-Vi-Anh-Dong-Nhi/ZW70UWO6.html';
```
Process content
```
$content = MediaEmbed::process($content);
```
Get get parsed content
```
$contentProcessed = $content->getContent();
```
Example http://youtube.com will become <a href="http://youtube.com">youtube.com</a>;

Check media object in content
```
$content->hasMedia();
```
If contain media you can get media object with
```
$media = $content->getMediaProvider();
```
You can set media width/height simple by
```
$media->setWidth(200); //pixcel
$media->setHeight(100);
```
Get Media Size
```
$media->getSize();
```
Get embed object(HTML)
```
$media->getHTML();
```
Get all media data
```
$data = $media->getData();
```
You also use
```
$data = $content->getMediaProvider()->getData()
```
Output
```
$data = [
    'provider' => 'mp3',
    'embed_type' => 'song',
    'id' => ZW70UWO6,
    'html' => '<iframe width="460" height="100" src="http://mp3.zing.vn/embed/song/ZW70UWO6?autostart=false" frameborder="0" allowfullscreen="true"></iframe>',
    'with' => default width,
    'height' => default height
];
```

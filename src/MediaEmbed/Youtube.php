<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 06/04/2015
 * Time: 10:10
 */

namespace MediaEmbed\Media;


class Youtube extends Media
{
    const MEDIA_WIDTH = 460;
    const MEDIA_HEIGHT = 345;

    protected $alias = 'youtube';

    public function getMediaSize()
    {
        $this->setWidth(self::MEDIA_WIDTH);
        $this->setHeight(self::MEDIA_HEIGHT);
        return ['width' => $this->width, 'height' => $this->height];
    }

    public function getHTML()
    {
        return '<iframe width="' . $this->width . '" height="' . $this->height . '" src="http://mp3.zing.vn/embed/' . $this->getEmbedType() . '/' . $this->getMediaId() . '?autostart=false" frameborder="0" allowfullscreen="true"></iframe>';
    }

}
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

    public function setSize()
    {
        $this->setWidth(self::MEDIA_WIDTH);
        $this->setHeight(self::MEDIA_HEIGHT);
    }


    public function getHTML()
    {
        return '<iframe width="' . $this->width . '" height="' . $this->height . '" src="https://www.youtube.com/embed/' . $this->getId() . '" frameborder="0" allowfullscreen="true"></iframe>';
    }

}
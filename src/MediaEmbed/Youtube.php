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

    public function getMediaSize()
    {
        return ['width' => self::MEDIA_WIDTH, 'height' => self::MEDIA_HEIGHT];
    }
}
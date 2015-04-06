<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 06/04/2015
 * Time: 10:05
 */

namespace MediaEmbed\Media;


class ZingMp3 extends Media
{
    const SONG_WIDTH = 460;
    const SONG_HEIGHT = 100;
    const PLAYLIST_WIDTH = 460;
    const PLAYLIST_HEIGHT = 225;
    const VIDEO_WIDTH = 460;
    const VIDEO_HEIGHT = 362;

    protected $alias = 'mp3';

    public function getEmbedType()
    {
        switch ($this->getType()) {
            case self::SONG:
                return 'song';
            case self::PLAYLIST:
                return 'album';
            case self::VIDEO:
                return 'video';
        }
        return false;
    }

    public function setSize($width = null, $height = null)
    {
        switch ($this->getType()) {
            case self::SONG:
                $this->setWidth(self::SONG_WIDTH);
                $this->setHeight(self::SONG_HEIGHT);
                break;
            case self::PLAYLIST:
                $this->setWidth(self::PLAYLIST_WIDTH);
                $this->setHeight(self::PLAYLIST_HEIGHT);
                break;
            case self::VIDEO:
                $this->setWidth(self::VIDEO_WIDTH);
                $this->setHeight(self::VIDEO_HEIGHT);
                break;
        }
        if ($width && $height) {
            $this->setWidth($width);
            $this->setHeight($height);
        }
    }

    public function getHTML()
    {
        return '<iframe width="' . $this->width . '" height="' . $this->height . '" src="http://mp3.zing.vn/embed/' . $this->getEmbedType() . '/' . $this->getId() . '?autostart=false" frameborder="0" allowfullscreen="true"></iframe>';
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 06/04/2015
 * Time: 10:09
 */

namespace MediaEmbed\Media;


class NhacCuaTui extends Media
{
    const SONG_WIDTH = 460;
    const SONG_HEIGHT = 286;
    const PLAYLIST_WIDTH = 460;
    const PLAYLIST_HEIGHT = 286;
    const VIDEO_WIDTH = 460;
    const VIDEO_HEIGHT = 362;

    public function getEmbedType()
    {
        switch ($this->getMediaType()) {
            case self::SONG:
                return 'm';
            case self::PLAYLIST:
                return 'l';
            case self::VIDEO:
                return 'video/xem-clip';
        }
        return false;
    }

    public function getMediaSize()
    {
        switch ($this->getMediaType()) {
            case self::SONG:
                return ['width' => self::SONG_WIDTH, 'height' => self::SONG_HEIGHT];
            case self::PLAYLIST:
                return ['width' => self::PLAYLIST_WIDTH, 'height' => self::PLAYLIST_HEIGHT];
            case self::VIDEO:
                return ['width' => self::VIDEO_WIDTH, 'height' => self::VIDEO_HEIGHT];
        }
        return false;
    }

}
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
        switch ($this->getMediaType()) {
            case self::SONG:
                return 'song';
            case self::PLAYLIST:
                return 'album';
            case self::VIDEO:
                return 'video';
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
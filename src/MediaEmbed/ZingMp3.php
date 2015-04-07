<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 06/04/2015
 * Time: 10:05
 */

namespace MediaEmbed;


/**
 * Class ZingMp3
 * @package MediaEmbed
 */
class ZingMp3 extends Media
{

    protected $songWidth = 460;
    protected $songHeight = 100;

    protected $playlistWidth = 460;
    protected $playlistHeight = 225;

    protected $videoWidth = 460;
    protected $videoHeight = 362;

    /**
     * Provider Alias
     * @var string
     */
    protected $alias = 'mp3';

    /**
     * Get type of embed in url path
     * @return bool|string
     */
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

    /**
     * Get embed code
     * @return string
     */
    public function getHTML()
    {
        return '<iframe width="' . $this->width . '" height="' . $this->height . '" src="http://mp3.zing.vn/embed/' . $this->getEmbedType() . '/' . $this->getId() . '?autostart=false" frameborder="0" allowfullscreen="true"></iframe>';
    }

}
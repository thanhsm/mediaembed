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

    protected $alias = 'ntc';

    public function getEmbedType()
    {
        switch ($this->getType()) {
            case self::SONG:
                return 'm';
            case self::PLAYLIST:
                return 'l';
            case self::VIDEO:
                return 'video/xem-clip';
        }
        return false;
    }

    public function getSize()
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
        return ['width' => $this->width, 'height' => $this->height];
    }

    public function getHTML()
    {
        $html = '<object width="' . $this->width . '" height="' . $this->height . '">';
        $html .= '<param name="movie" value="http://www.nhaccuatui.com/m/' . $this->getId() . '"/>';
        $html .= '<param name="quality" value="high"/>';
        $html .= '<param name="wmode" value="transparent"/>';
        $html .= '<param name="allowscriptaccess" value="always"/>';
        $html .= '<param name="allowfullscreen" value="true"/>';
        $html .= '<param name="flashvars" value="autostart=false"/>';
        $html .= '<embed src="http://www.nhaccuatui.com/' . $this->getEmbedType() . '/' . $this->getId() . '" flashvars="target=blank&autostart=false" allowscriptaccess="always" allowfullscreen="true" quality="high" wmode="transparent" type="application/x-shockwave-flash" width="' . $this->width . '" height="' . $this->height . '">';
        $html .= '</object>';
        return $html;
    }
}
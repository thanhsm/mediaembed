<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 06/04/2015
 * Time: 10:09
 */

namespace MediaEmbed;


/**
 * Class NhacCuaTui
 * @package MediaEmbed
 */
class NhacCuaTui extends Media
{

    protected $songWidth = 460;
    protected $songHeight = 286;

    protected $playlistWidth = 460;
    protected $playlistHeight = 286;

    protected $videoWidth = 460;
    protected $videoHeight = 362;

    /**
     * Alias
     * @var string
     */
    protected $alias = 'ntc';

    /**
     * Get embed type path
     * @return bool|string
     */
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

    /**
     * Get HTML embed code
     * @return string
     */
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
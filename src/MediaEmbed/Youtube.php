<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 06/04/2015
 * Time: 10:10
 */

namespace MediaEmbed;


/**
 * Class Youtube
 * @package MediaEmbed
 */
class Youtube extends Media
{
    /**
     * @var int
     */
    protected $videoWidth = 460;
    /**
     * @var int
     */
    protected $videoHeight = 345;

    /**
     * Provider Alias
     * @var string
     */
    protected $alias = 'youtube';

    /**
     * Initialize default size
     */
    public function initSize()
    {
        $this->setWidth($this->videoWidth);
        $this->setHeight($this->videoHeight);
    }

    /**
     * Get embed code HTML
     * @return string
     */
    public function getHTML()
    {
        return '<iframe width="' . $this->width . '" height="' . $this->height . '" src="https://www.youtube.com/embed/' . $this->getId() . '" frameborder="0" allowfullscreen="true"></iframe>';
    }

}
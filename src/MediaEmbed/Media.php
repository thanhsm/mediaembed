<?php

namespace MediaEmbed;

/**
 * Class Media
 * @package MediaEmbed
 */
class Media
{

    const PLAYLIST = 'playlist';
    const SONG = 'song';
    const VIDEO = 'video';

    private $mediaId;
    private $mediaType;

    protected $songWidth;
    protected $songHeight;

    protected $playlistWidth;
    protected $playlistHeight;

    protected $videoWidth;
    protected $videoHeight;
    /**
     * Provider alias
     * @var
     */
    protected $alias;

    protected $width;
    protected $height;

    /**
     * @param $mediaId
     * @param $mediaType
     */
    public function __construct($mediaId, $mediaType)
    {
        $this->mediaId = $mediaId;
        $this->mediaType = $mediaType;
        if ($this->getType() && (is_null($this->width) || is_null($this->height))) {
            $this->initSize();
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->mediaId;
    }

    /**
     * @param mixed $mediaId
     */
    public function setId($mediaId)
    {
        $this->mediaId = $mediaId;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->mediaType;
    }

    /**
     * @param mixed $mediaType
     */
    public function setType($mediaType)
    {
        $this->mediaType = $mediaType;
    }

    /**
     * Get  type of embed in url path
     * @return null
     */
    public function getEmbedType()
    {
        return null;
    }

    /**
     * Initialize default media size
     */
    public function initSize()
    {
        switch ($this->getType()) {
            case self::SONG:
                $this->setWidth($this->songWidth);
                $this->setHeight($this->songHeight);
                break;
            case self::PLAYLIST:
                $this->setWidth($this->playlistWidth);
                $this->setHeight($this->playlistHeight);
                break;
            case self::VIDEO:
                $this->setWidth($this->videoWidth);
                $this->setHeight($this->videoHeight);
                break;
        }
    }

    /**
     * @param $width
     * @param $height
     */
    public function setSize($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get media size
     * @return array
     */
    public function getSize()
    {
        return ['width' => $this->width, 'height' => $this->height];
    }

    /**
     * Get all media data
     * @return array
     */
    public function getData()
    {
        return [
            'provider' => $this->getProviderName(),
            'embed_type' => $this->getEmbedType(),
            'id' => $this->getId(),
            'html' => $this->getHTML()
        ] + $this->getSize();
    }

    /**
     * Get provider name
     * @return mixed
     */
    public function getProviderName()
    {
        return $this->alias;
    }

    /**
     * Get HTML embed code
     * @return null
     */
    public function getHTML()
    {
        return null;
    }

    /**
     * Get Alias alternative method of get provider name
     * @return mixed
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param mixed $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

}
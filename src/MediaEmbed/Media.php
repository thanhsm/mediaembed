<?php
namespace MediaEmbed\Media;

class Media
{
    const PLAYLIST = 'playlist';
    const SONG = 'song';
    const VIDEO = 'video';

    private $mediaId;
    private $mediaType;

    protected $alias;
    protected $width;
    protected $height;

    public function __construct($mediaId, $mediaType)
    {
        $this->mediaId = $mediaId;
        $this->mediaType = $mediaType;
        if ($this->getType() && (is_null($this->width) || is_null($this->height))) {
            $this->setSize();
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

    public function getEmbedType()
    {
        return null;
    }

    public function setSize()
    {
        return null;
    }

    public function getSize()
    {
        return ['width' => $this->width, 'height' => $this->height];
    }

    public function getData()
    {
        return [
            'provider' => $this->getProviderName(),
            'embed_type' => $this->getEmbedType(),
            'id' => $this->getId(),
            'html' => $this->getHTML()
        ] + $this->getSize();
    }

    public function getProviderName()
    {
        return $this->alias;
    }

    public function getHTML()
    {
        return null;
    }

    /**
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
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

    protected $width = 460;
    protected $height = 345;

    public function __construct($mediaId, $mediaType)
    {
        $this->mediaId = $mediaId;
        $this->mediaType = $mediaType;
    }

    /**
     * @return mixed
     */
    public function getMediaId()
    {
        return $this->mediaId;
    }

    /**
     * @param mixed $mediaId
     */
    public function setMediaId($mediaId)
    {
        $this->mediaId = $mediaId;
    }

    /**
     * @return mixed
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * @param mixed $mediaType
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;
    }

    public function getEmbedType()
    {
        return null;
    }

    public function getMediaSize()
    {
        return null;
    }

    public function getMediaData()
    {
        return [
            'provider' => $this->getProviderName(),
            'embed_type' => $this->getEmbedType(),
            'id' => $this->getMediaId(),
            'html' => $this->getHTML()
        ] + $this->getMediaSize();
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
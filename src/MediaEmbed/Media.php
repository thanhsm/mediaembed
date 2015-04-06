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
            'id' => $this->getMediaId()
            ] + $this->getMediaSize();
    }

    public function getProviderName()
    {
        return $this->alias;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 06/04/2015
 * Time: 10:11
 */

namespace MediaEmbed\Media;


class MediaEmbed
{
    const ZING_MP3 = 'zing.mp3';
    const ZING_MP3_ID_LENGTH = 8;
    const ZING_MP3_HOST = 'mp3.zing.vn';

    const NTC = 'nhaccuatui';
    const NTC_SONG_ID_LENGTH = 12;
    const NTC_VIDEO_ID_LENGTH = 13;
    const NTC_HOST = 'www.nhaccuatui.com';

    const YOUTUBE = 'youtube';
    const YOUTUBE_VIDEO_ID_LENGTH = 11;
    const YOUTUBE_HOST = 'youtube.com';

    const PLAYLIST = 'playlist';
    const SONG = 'song';
    const VIDEO = 'video';

    private static $content;
    private static $provider;

    public static function process($input)
    {
        self::setContent(static::parseLink($input));
        self::setProvider(static::searchProvider(self::$content));
        return new static;
    }

    protected static function parseLink($string)
    {
        $string = nl2br($string);
        /*** make sure there is an http:// on all URLs ***/
        $string = preg_replace("/([^\w\/])(www\.[a-z0-9\-]+\.[a-z0-9\-]+)/i", "$1http://$2", $string);
        /*** make all URLs links ***/
        $string = preg_replace("/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i", "<a target=\"_blank\" href=\"$1\">$1</a>", $string);
        /*** make all emails hot links ***/
        $string = preg_replace("/([\w-?&;#~=\.\/]+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?))/i", "<a href=\"mailto:$1\">$1</a>", $string);
        return $string;
    }

    protected static function searchProvider($content)
    {
        preg_match('/\b(?:(?:https?|ftp|file):\/\/|www\.|ftp\.)[-A-Z0-9+&@#\/%=~_|$?!:,.]*[A-Z0-9+&@#\/%=~_|$]/i', $content, $url);
        // Only allow embed one object
        if (isset($url[0])) {
            $urlInfo = parse_url($url[0]);
            if (isset($urlInfo['host']) && $urlInfo['host'] == self::ZING_MP3_HOST) {
                $path = pathinfo($urlInfo['path']);
                $allowMediaPaths = ['video-clip', 'bai-hat', 'playlist', 'album'];
                $urlPaths = explode('/', $path['dirname']);
                $isPlaylist = array_intersect($urlPaths, ['playlist']);
                $isAlbum = array_intersect($urlPaths, ['album']);
                $isVideo = array_intersect($urlPaths, ['video-clip']);
                $match = array_intersect($allowMediaPaths, $urlPaths);
                $mediaId = $path['filename'];
                if ($match && strlen($mediaId) === self::ZING_MP3_ID_LENGTH) {
                    if ($isPlaylist || $isAlbum) {
                        $type = self::PLAYLIST;
                    } elseif ($isVideo) {
                        $type = self::VIDEO;
                    } else {
                        $type = self::SONG;
                    }
                    return new ZingMp3($mediaId, $type);
                }
            }
            if (isset($urlInfo['host']) && $urlInfo['host'] == self::NTC_HOST) {
                $path = pathinfo($urlInfo['path']);
                $allowMediaPaths = ['video', 'bai-hat', 'playlist'];
                $urlPaths = explode('/', $path['dirname']);
                $isPlaylist = array_intersect($urlPaths, ['playlist']);
                $isVideo = array_intersect($urlPaths, ['video']);
                $match = array_intersect($allowMediaPaths, $urlPaths);
                $mediaId = explode('.', $path['filename'])[1];
                if ($isVideo && $match && strlen($mediaId) == self::NTC_VIDEO_ID_LENGTH) {
                    $type = self::VIDEO;
                    return new NhacCuaTui($mediaId, $type);
                }
                if ($match && strlen($mediaId) === self::NTC_SONG_ID_LENGTH) {
                    if ($isPlaylist) {
                        $type = self::PLAYLIST;
                    } else {
                        $type = self::SONG;
                    }
                    return new NhacCuaTui($mediaId, $type);
                }
            }
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $content, $matches);
            if (isset($matches[1]) && $matches[1] != 'www.youtube') {
                $videoId = $matches[1];
                $type = self::VIDEO;
                return new Youtube($videoId, $type);
            }
        }
        return null;
    }

    /**
     * @return mixed
     */
    public static function getContent()
    {
        return self::$content;
    }

    /**
     * @param mixed $content
     */
    public static function setContent($content)
    {
        self::$content = $content;
    }

    /**
     * @return mixed
     */
    public static function getProvider()
    {
        return self::$provider;
    }

    /**
     * @param mixed $provider
     */
    public static function setProvider($provider)
    {
        self::$provider = $provider;
    }

}
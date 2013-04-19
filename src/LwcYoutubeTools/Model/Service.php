<?php

namespace LwcYoutubeTools\Model;

use LwcYoutubeTools\Model\Service\Options;

class Service
{
    /**
     * @var Options
     */
    protected $options;

    /**
     * @param Options $serviceOptions
     */
    public function __construct (Options $serviceOptions)
    {
        $this->setOptions($serviceOptions);
    }

    /**
     * @param Options $options
     * @return \LwcYoutubeTools\Model\Service
     */
    public function setOptions (Options $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return \LwcYoutubeTools\Model\Service\Options
     */
    public function getOptions ()
    {
        return $this->options;
    }

    /**
     * @param string $playlistId
     * @return \ZendGData\YouTube\PlaylistVideoFeed|bool
     */
    public function getPlaylist ($playlistId)
    {
        $options = $this->getOptions();
        $cacheKey = 'lwcyoutube_playlist_' . $playlistId;

        if($options->getUseCache()) {
            $cache = $options->getZendCache();
            $result = $cache->getItem($cacheKey, $success);
            if($success) {
                return $result;
            }
        }

        $playlists = $this->getPlaylists();
        foreach($playlists as $playlist) {
            if((string) $playlist->getPlaylistId() !== $playlistId) {
                continue;
            }
            $feedUrl = $playlist->getPlaylistVideoFeedUrl();
            $feed = $options->getYoutube()->getPlaylistVideoFeed($feedUrl);

            if($options->getUseCache()) {
                $cache = $options->getZendCache();
                $cache->setItem($cacheKey, $feed);
            }
            return $feed;
        }
        return false;
    }

    /**
     * @return \ZendGData\YouTube\PlaylistListFeed
     */
    public function getPlaylists ()
    {
        $options = $this->getOptions();
        $yt = $options->getYoutube();

        return $yt->getPlaylistListFeed($options->getUsername());
    }
}
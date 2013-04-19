<?php

namespace LwcYoutubeTools\Model\Service;

use Zend\Stdlib\AbstractOptions;
use Zend\Cache\Storage\StorageInterface;
use ZendGData\YouTube;

class Options extends AbstractOptions
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @var YouTube
     */
    protected $youtube;

    /**
     * @var boolean
     */
    protected $useCache = true;

    /**
     * @var StorageInterface
     */
    protected $zendCache;

    /**
     * @param YouTube $yt
     * @return \LwcYoutubeTools\Model\Service\Options
     */
    public function setYoutube (YouTube $yt)
    {
        $this->youtube = $yt;
        return $this;
    }

    /**
     * @return \ZendGData\YouTube
     */
    public function getYoutube ()
    {
        return $this->youtube;
    }

    /**
     * @param StorageInterface $cache
     * @return \LwcYoutubeTools\Model\Service\Options
     */
    public function setZendCache (StorageInterface $cache)
    {
        $this->zendCache = $cache;
        return $this;
    }

    /**
     * @return StorageInterface
     */
    public function getZendCache ()
    {
        return $this->zendCache;
    }

    /**
     * @param boolean $flag
     * @return \LwcYoutubeTools\Model\Service\Options
     */
    public function setUseCache ($flag)
    {
        $this->useCache = (bool) $flag;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getUseCache ()
    {
        return $this->useCache;
    }

    /**
     * @return string
     */
    public function getUsername ()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return \LwcYoutubeTools\Model\Service\Options
     */
    public function setUsername ($username)
    {
        $this->username = (string) $username;
        return $this;
    }
}
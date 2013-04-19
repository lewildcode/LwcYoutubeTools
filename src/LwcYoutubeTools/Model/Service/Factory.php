<?php

namespace LwcYoutubeTools\Model\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use LwcYoutubeTools\Model\Service;
use ZendGData\YouTube;

class Factory implements FactoryInterface
{
    /**
     * (non-PHPdoc)
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        if (!isset($config['lwcyoutubetools'])) {
            throw new \Exception('Missing lwcyoutubetools config');
        }
        $config = $config['lwcyoutubetools'];

        if(!isset($config['http_client'])) {
            $config['http_client'] = array();
        }
        if(!isset($config['username'])) {
            throw new \Exception('Missing "username" in "lwcyoutubetools" config.');
        }

        $yt = new YouTube();
        $yt->getHttpClient()->setOptions($config['http_client']);
        $yt->setMajorProtocolVersion(2);
        unset($config['http_client']);

        $options = new Options($config);
        $options->setYoutube($yt);

        return new Service($options);
    }
}
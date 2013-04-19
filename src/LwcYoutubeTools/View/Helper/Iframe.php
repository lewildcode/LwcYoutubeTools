<?php

namespace LwcYoutubeTools\View\Helper;

use Zend\View\Helper\AbstractHtmlElement;
use ZendGData\YouTube\VideoEntry;

class Iframe extends AbstractHtmlElement
{
    /**
     * @param VideoEntry $video
     * @param integer $width
     * @param integer $height
     * @return string
     */
    public function __invoke(VideoEntry $video, $width, $height, $frameborder = 0)
    {
        if(!$video->isVideoEmbeddable()) {
            return false;
        }
        $attribs= array(
            'width' => $width,
            'height' => $height,
            'src' => $this->getVideoUrl($video),
            'frameborder' => $frameborder
        );
        return '<iframe ' . $this->htmlAttribs($attribs) . ' allowfullscreen></iframe>';
    }

    /**
     * @param VideoEntry $video
     * @return string
     */
    protected function getVideoUrl (VideoEntry $video)
    {
        return 'http://www.youtube.com/embed/' . $this->parseVideoId($video);
    }

    /**
     * @param VideoEntry $video
     * @return string
     */
    protected function parseVideoId (VideoEntry $video)
    {
        $ytUrl = $video->getAlternateLink()->href;
        $start = strpos($ytUrl, 'v=') + 2;
        $end = strpos($ytUrl, '&');
        return substr($ytUrl, $start, $end - $start);
    }
}
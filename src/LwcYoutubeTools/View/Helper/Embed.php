<?php

namespace LwcYoutubeTools\View\Helper;

use Zend\View\Helper\AbstractHelper;
use ZendGData\YouTube\PlaylistVideoEntry;

class Embed extends AbstractHelper
{
    /**
     * @param PlaylistVideoEntry $video
     * @param integer $width
     * @param integer $height
     * @return string
     */
    public function __invoke(PlaylistVideoEntry $video, $width, $height)
    {
        $embedAttribs = array(
            'allowscriptaccess' => 'always',
            'allowfullscreen' => 'true',
            'width' => $width,
            'height' => $height,
            'src' => $video->getFlashPlayerUrl(),
            'type' => 'application/x-shockwave-flash'

        );
        $objectAttribs = array(
            'width' => $width,
            'height' => $height
        );
        $params = array(
            'movie' => $video->getFlashPlayerUrl(),
            'allowFullScreen' => 'true',
            'allowscriptaccess' => 'always'
        );

        $output = '<object ';
        foreach($objectAttribs as $attrib => $value) {
            $output .= $attrib . '="' . $this->view->escapeHtml($value) .'" ';
        }
        $output .= '>' . PHP_EOL;
        foreach($params as $name => $value) {
            $output .= '<param name="' . $name .'" value="' . $this->view->escapeHtml($value) .'"></param>' . PHP_EOL;
        }
        $output .= '<embed ';
        foreach($embedAttribs as $attrib => $value) {
             $output .= $attrib . '="' . $this->view->escapeHtml($value) .'" ';
        }
        $output .= '></embed>' . PHP_EOL;
        $output .= '</object>' . PHP_EOL;

        return $output;
    }
}
<?php

namespace LwcYoutubeTools\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Embed extends AbstractHelper
{
    /**
     * Youtube embedding code
     *
     * @param string $src youtube video url
     * @param integer $width width of the object
     * @param integer $height height of the object
     * @return string
     */
    public function __invoke($src, $width, $height)
    {
        $embedAttribs = array(
            'allowscriptaccess' => 'always',
            'allowfullscreen' => 'true',
            'width' => $width,
            'height' => $height,
            'src' => $src,
            'type' => 'application/x-shockwave-flash'

        );
        $objectAttribs = array(
            'width' => $width,
            'height' => $height
        );
        $params = array(
            'movie' => $src,
            'allowFullScreen' => 'true',
            'allowscriptaccess' => 'always'
        );

        $output = '<object ';
        foreach($objectAttribs as $attrib => $value) {
            $output .= $attrib . '="' . $this->view->escape($value) .'" ';
        }
        $output .= '>' . PHP_EOL;
        foreach($params as $name => $value) {
            $output .= '<param name="' . $name .'" value="' . $this->view->escape($value) .'"></param>' . PHP_EOL;
        }
        $output .= '<embed ';
        foreach($embedAttribs as $attrib => $value) {
             $output .= $attrib . '="' . $this->view->escape($value) .'" ';
        }
        $output .= '></embed>' . PHP_EOL;
        $output .= '</object>' . PHP_EOL;

        return $output;
    }
}
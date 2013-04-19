<?php

namespace LwcYoutubeToolsTest\View\Helper;

use LwcYoutubeTools\View\Helper\Embed;
use ZendGData\YouTube\VideoEntry;
use Zend\View\Renderer\PhpRenderer;

class EmbedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Embed
     */
    protected $helper;

    protected function setUp ()
    {
        $this->helper = new Embed();
        $this->helper->setView(new PhpRenderer());
    }

    public function testHtmlObject ()
    {
        $invokedHtml = $this->helper(new VideoEntry(), 100, 50);

        $this->assertContains('width="100"', $invokedHtml);
        $this->assertContains('height="50"', $invokedHtml);
        $this->assertContains('</object>', $invokedHtml)
    }

}
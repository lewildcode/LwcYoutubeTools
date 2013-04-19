<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'LwcYoutubeToolsService' => 'LwcYoutubeTools\Model\Service\Factory'
        )
    ),
    'view_helpers' => array(
        'invokables' => array(
            'youtubeFlashEmbed' => 'LwcYoutubeTools\View\Helper\Embed',
            'youtubeIframe' => 'LwcYoutubeTools\View\Helper\Iframe'
        )
    )
);
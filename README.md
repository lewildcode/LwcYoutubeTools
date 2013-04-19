LwcYoutubeTools
===============


To install via composer, add the repository to your composer.json

    "repositories": [
        {
            "type": "package",
            "package": {
                "name": "LwcYoutubeTools",
                "version": "1.0.0",
                "source": {
                    "url": "http://github.com/lewildcode/LwcYoutubeTools",
                    "type": "git",
                    "reference": "master"
                }
            }
        }
    ],

then add the package to the require block

    "require": {
        "LwcYoutubeTools": "1.*",
        "zendframework/zendgdata": "2.*"
    }

Add the "LwcYoutubeTools" module to the config/application.config.php. Copy the .dist config file to your config/autoload/ directory and modify as needed.

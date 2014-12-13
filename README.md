weleoka/crssb
=========

PHP class for wrapping simplepie parser with RSS functionality.

The B version has unit testing. crssb.

By Kai Weeks, me@eee.se.

[![Build Status](https://travis-ci.org/weleoka/crssb.svg?branch=master)](https://travis-ci.org/weleoka/crssb)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/weleoka/crssb/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/weleoka/crssb/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/weleoka/crssb/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/weleoka/crssb/?branch=master)

The PHP Class has the functions to output latest feed, a brief list of recent feeds, and then the whole feed entity.
oneFeed(), streamlineFeed() and printFeed() respectively give output. 

PHPUnit tests can be found by running the /test/config.php with PHPUnit.

Please give feedback on any improvements that you would like to see. 
And report bugs to me@eee.se!!!!


License 
------------------

This software is free software and carries a MIT license.


Setup for Anax-MVC
------------------
Important: The cache folder in /src has to be writable to the webserver for Crss to work.
Important: For production environment if running apache-server be aware of the .htaccess in webroot.

* Clone a version of Anax-MVC from https://github.com/mosbth/Anax-MVC.git

* Install composer.phar in Anax-MVC root directory.

* Modify composer.json by adding the required packages (note: simplepie is not required but needs to be installed in Crssb directory):
    "require": {
				"weleoka/crssb": "dev-master"
    }

* Run the composer config and update commands to get the latest packagist.com dev of weleoka/crssb istalled in the vendor directory.
			Then again run config and update on composer.phar in the Crssb directory which already has included a composer.json file.
			This installs SimplePie as a dependency for crssb.

*Then copy this code into Anax-MVC's webroot/hello.php

$feed = new \Weleoka\Crssb\Crssb( [
    		'http://feeds.feedburner.com/TechCrunch/'
    ]);
$app->views->add($feed->printFeed());

* Substitute the feed for any other RSS of your choice.

* For basic formatting copy weleoka/crssb/webroot/css/rss.css to Anax-MVC/webroot/css directory for basic styling.

* Enjoy!!!


History
-----------------------------------


v1.0.1 (latest)

v1.0.1 (2014-12-13)
v1.0 (2014-12-12)


```
 .  
..:  Copyright (c) 2013 - 2014 Kai Weeks, me@eeee.se
```



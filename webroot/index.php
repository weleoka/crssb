<?php
require '../src/Crssb/Crssb.php';
require '../src/Crssb/Exception.php';
require '../src/Crssb/Functions.php';
	 
	 $feedURL = 'https://feeds.feedburner.com/TechCrunch/';
    $feed = new Weleoka\Crssb\Crssb( $feedURL );
    //https://news.ycombinator.com/rss
?>

<!doctype html>
<html lang="en">

<head>
<meta charset=utf8>
<title>RSS Example of weleoka/CRSSB</title>

<!-- links to external stylesheets -->	
<link rel="stylesheet" href="css/rss.css" title="General stylesheet">
<!-- favicon -->
<link rel="shortcut icon" href="img/drop.png">


</head>

<body>
<h1>RSS Example</h1>
<?=$feed->oneFeed();?> 
<?=$feed->streamlineFeed();?> 

</body>
</html>
<?php

error_reporting(0);
$header_image = [];

$cache_time = 3600*1; // 1 hour

$cache_file = $_SERVER['DOCUMENT_ROOT'].'/_medium/cache.xml';

$timedif = (time() - filemtime($cache_file));

if (file_exists($cache_file) && $timedif < $cache_time) {
    $string = file_get_contents($cache_file);
} else {
    $string = file_get_contents('https://medium.com/feed/@jjkilpatrick');
    if ($f = fopen($cache_file, 'w')) {
        fwrite ($f, $string, strlen($string));
        fclose($f);
    }
}

$xml = simplexml_load_string($string);

foreach ($xml->channel->item as $medium) {
	$description = (string)$medium->description;
	preg_match( '@src="([^"]+)"@' , $description, $match );
	$src = array_pop($match);
	array_push($header_image, $src);
}

$image_name = explode('/', $header_image[0]);
$from_to = array("600" => "1200", "200" => "800");
$image = strtr($header_image[0], $from_to);

if (!file_exists(end($image_name))) {
	copy($image, "_includes/images/headers/" . end($image_name));
}

?>
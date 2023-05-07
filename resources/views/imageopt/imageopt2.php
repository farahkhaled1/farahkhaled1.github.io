<?php

$ch = curl_init('https://www.pexels.com/silent/');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

$dom = new DOMDocument;
libxml_use_internal_errors($result);
$dom->loadHTML($result);

$tags = $dom->getElementsByTagName('img');





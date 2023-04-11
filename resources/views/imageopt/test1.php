<?php

$website_url = "https://example.com";

// create a new DOMDocument instance
$dom = new DOMDocument();

// load the website HTML
$html = file_get_contents($website_url);

// suppress warnings for poorly formed HTML
libxml_use_internal_errors(true);

// load the HTML into the DOMDocument
$dom->loadHTML($html);

// find all image tags in the HTML
$images = $dom->getElementsByTagName("img");

// generate a unique directory name using the current timestamp
$dir = "imagesss_" . time();

foreach ($images as $image) {
    // get the source URL of the image
    $image_url = $image->getAttribute("src");

    // generate a filename for the image
    $filename = basename($image_url);

    // create the directory if it doesn't exist
    if (!is_dir($dir)) {
        mkdir($dir);
    }

    // download the image and save it in the directory
    $image_data = file_get_contents($image_url);
    file_put_contents($dir . "/" . $filename, $image_data);
    echo "Downloaded: " . $filename . "<br>";
}

?>

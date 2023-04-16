 
<?php

// // Set the URL of the website you want to scrape images from
// $url = 'https://moodle.miuegypt.edu.eg/';

// // Set the path to the directory where the converted images will be saved
// $dirName = 'images_' . time();
// mkdir($dirName);
// $save_dir = $dirName . '/';

// // Set the quality level for the WebP images (0-100)
// $quality = 80;

// // Create a new DOMDocument object
// $dom = new DOMDocument();

// // Load the HTML content of the website
// $options = array(
//     'ssl' => array(
//         'verify_peer' => false,
//         'verify_peer_name' => false,
//     ),
// );
// $html = file_get_contents($url, false, stream_context_create($options));

// // Disable libxml errors and warnings
// libxml_use_internal_errors(true);

// // Load the HTML content into the DOMDocument object
// $dom->loadHTML($html, LIBXML_NOENT | LIBXML_HTML_NODEFDTD);

// // Get the errors and warnings that occurred during loading
// $errors = libxml_get_errors();

// // Loop through the errors and display them
// foreach ($errors as $error) {
//     echo "Error: " . $error->message . " at line " . $error->line . "\n";
// }

// // Find all the image tags on the page
// $images = $dom->getElementsByTagName('img');

// // Loop through each image and save it as a WebP image
// foreach ($images as $image) {
//     // Get the source URL of the image
//     $src = $image->getAttribute('src');

//     // Check if the image is hosted on a secure server
//     $ssl = (strpos($src, 'https') === 0);

//     // Set the file extension based on the SSL status
//     $ext = ($ssl ? '.webp' : '.jpg');

//     // Set the full path and filename for the saved image
//     $save_path = $save_dir . basename($src, '.jpg') . $ext;

//     // Check if the file already exists
//     if (!file_exists($save_path)) {
//         // Get the image data from the source URL
//         $img_data = file_get_contents($src, false, stream_context_create($options));

//         // Check if the image data is valid
//         $img_info = getimagesizefromstring($img_data);
//         if (!$img_info) {
//             echo "Invalid image data: $src\n";
//             continue;
//         }

//         // Create a new image from the source data
//         $img = imagecreatefromstring($img_data);

//         // Save the image as a WebP image
//         if ($ssl) {
//             imagewebp($img, $save_path, $quality);
//         } else {
//             // Convert the image to WebP format
//             $webp_data = imagewebp($img, null, $quality);

//             // Save the WebP data to a file
//             file_put_contents($save_path, $webp_data);
//         }

//         // Free up memory
//         imagedestroy($img);
//     }
// }

// // Output a success message
// echo 'Images have been saved as WebP in directory ' . $dirName;

// header('Location: http://127.0.0.1:8000/dashboard');

// exit; 

?>





<?php

// Set the URL of the website you want to scrape images from
$url = 'https://miuegypt.edu.eg/';

// Set the path to the directory where the converted images will be saved
$dirName = 'images_' . time();
mkdir($dirName);
$save_dir = $dirName . '/';

// Set the quality level for the WebP images (0-100)
$quality = 80;

// Create a new DOMDocument object
$dom = new DOMDocument();

// Load the HTML content of the website
$options = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
    ),
);
$html = file_get_contents($url, false, stream_context_create($options));

// Disable libxml errors and warnings
libxml_use_internal_errors(true);

// Load the HTML content into the DOMDocument object
$dom->loadHTML($html, LIBXML_NOENT | LIBXML_HTML_NODEFDTD);

// Get the errors and warnings that occurred during loading
$errors = libxml_get_errors();

// Loop through the errors and display them
foreach ($errors as $error) {
    echo "Error: " . $error->message . " at line " . $error->line . "\n";
}

// Find all the image tags on the page
$images = $dom->getElementsByTagName('img');

// Loop through each image and save it as a WebP image
foreach ($images as $image) {
    // Get the source URL of the image
    $src = $image->getAttribute('src');

    // Check if the image is hosted on a secure server
    $ssl = (strpos($src, 'https') === 0);

    // Get the file extension of the image
    $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));

    // Set the full path and filename for the saved image
    $save_path = $save_dir . basename($src, '.' . $ext) . '.webp';

    // Check if the file already exists
    if (!file_exists($save_path)) {
        // Get the image data from the source URL
        $img_data = file_get_contents($src, false, stream_context_create($options));

        // Check if the image data is valid
        if (!$img_data) {
            echo "Invalid image data: $src\n";
            continue;
        }

        // Create a temporary file to hold the image data
        $tmp_file = tmpfile();
        fwrite($tmp_file, $img_data);
        fseek($tmp_file, 0);

        // Get the image size from the temporary file
        $img_info = getimagesize(stream_get_meta_data($tmp_file)['uri']);
        if (!$img_info) {
            echo "Invalid image data: $src\n";
            continue;
        }

        // Create a new image from the source data
        switch ($ext) {
            case 'jpeg':
            case 'jpg':
                $img = imagecreatefromjpeg(stream_get_meta_data($tmp_file)['uri']);
                break;
            case 'png':
                $img = imagecreatefrompng(stream_get_meta_data($tmp_file)['uri']);
                break;
            case 'svg':
                $img = imagecreatefromstring($img_data);
                break;
            default:
                echo "Unsupported image type: $src\n";
                continue 2;
        }

        // Save the image as a WebP image
        if ($ssl) {
            imagewebp($img, $save_path, $quality);
      
    
        } else {
            // Convert the image to WebP format
            $webp_data = imagewebp($img, null, $quality);

            // Save the WebP data to a file
            file_put_contents($save_path, $webp_data);
        }

        // Free up memory
        imagedestroy($img);
    }
}

// Output a success message

// Output a success message
echo 'Images have been saved as WebP in directory ' . $dirName;


header('Location: http://127.0.0.1:8000/dashboard');

exit; 

?>
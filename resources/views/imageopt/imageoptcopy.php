<?php

// $website_url = "https://miuegypt.edu.eg";

// $opts = [
//     'ssl' => [
//         'verify_peer' => false,
//         'verify_peer_name' => false
//     ]
// ];

// $context = stream_context_create($opts);

// $website_url = 'https://miuegypt.edu.eg';
// $image_data = file_get_contents($website_url, false, $context);

// $filename = basename($website_url);
// file_put_contents($filename, $image_data);


// // create a new DOMDocument instance
// $dom = new DOMDocument();


// // load the website HTML
// $html = file_get_contents($website_url);

// // suppress warnings for poorly formed HTML
// libxml_use_internal_errors(true);

// // load the HTML into the DOMDocument
// $dom->loadHTML($html);

// // find all image tags in the HTML
// $images = $dom->getElementsByTagName("img");

// // generate a unique directory name using the current timestamp
// $dir = "imagesss_" . time();

// foreach ($images as $image) {
//     // get the source URL of the image
//     $image_url = $image->getAttribute("src");

//     // generate a filename for the image
//     $filename = basename($image_url);

//     // create the directory if it doesn't exist
//     if (!is_dir($dir)) {
//         mkdir($dir);
//     }

//     // download the image and save it in the directory
//     $image_data = file_get_contents($image_url);
//     file_put_contents($dir . "/" . $filename, $image_data);
//     echo "Downloaded: " . $filename . "<br>";
// }

// ?>


<!-- ///////////////--------------------------------------------------------------////////////////////// -->


 <?php
// // if(isset($_POST['website_url'])){
// //     $website_url = $_POST['website_url'];

// //     // create a new DOMDocument instance
// //     $dom = new DOMDocument();

// //     // load the website HTML
// //     $html = file_get_contents($website_url);

// //     // suppress warnings for poorly formed HTML
// //     libxml_use_internal_errors(true);

// //     // load the HTML into the DOMDocument
// //     $dom->loadHTML($html);

// //     // find all image tags in the HTML
// //     $images = $dom->getElementsByTagName("img");

// //     // generate a unique directory name using the current timestamp
// //     $dir = "imagesss_" . time();

// //     foreach ($images as $image) {
// //         // get the source URL of the image
// //         $image_url = $image->getAttribute("src");

// //         // generate a filename for the image
// //         $filename = basename($image_url);

// //         // create the directory if it doesn't exist
// //         if (!is_dir($dir)) {
// //             mkdir($dir);
// //         }

// //         // download the image and save it in the directory
// //         $image_data = file_get_contents($image_url);
// //         file_put_contents($dir . "/" . $filename, $image_data);
// //         echo "Downloaded: " . $filename . "<br>";
// //     }
// // }
?>

<html>
<head>
    <title>Image Scraper</title>
</head>
<!-- <body>
    <form method="POST">
        <label for="website_url">Enter website URL:</label>
        <input type="text" name="website_url" id="website_url" required>
        <br>
        <button type="submit">Scrape Images</button>
    </form>
</body> -->
</html>

<!-- ///////////////--------------------------------------------------------------////////////////////// -->

<?php
// $ch=curl_init();
// curl_setopt($ch,CURLOPT_URL,'https://www.bigbasket.com/cl/fruits-vegetables/#!page=4');
// curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
// $result=curl_exec($ch);
// curl_close($ch);

// preg_match_all('!//www.bigbasket.com/media/uploads/p/s/(.*).jpg!',$result,$data);

// $finalArr=array_unique($data[0]);

// foreach($finalArr as $list){
// 	echo "<img src='$list'/>";
// }
?>

<!-- ///////////////--------------------------------------------------------------////////////////////// -->



<?php

// // Set the URL of the website you want to scrape images from
// $url = 'https://my.clevelandclinic.org/';

// // Set the path to the directory where the converted images will be saved
// $save_dir = 'images/';

// // Set the quality level for the WebP images (0-100)
// $quality = 80;

// // Create a new DOMDocument object
// $dom = new DOMDocument();

// // Load the HTML content of the website
// $html = file_get_contents($url);

// // Load the HTML content into the DOMDocument object
// @$dom->loadHTML($html);

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
//         // Create a new image from the source URL
//         $img = imagecreatefromstring(file_get_contents($src));

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

?>
<!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
<!-- SCRAPING ANY WEBSITE KOLO ALA BAADO -->

<?php

// // Initialize a new cURL session
// $ch = curl_init();

// // Set the URL to fetch
// $url = 'https://amazon.eg';
// curl_setopt($ch, CURLOPT_URL, $url);

// // Set any required cURL options
// // For example, to follow redirects and disable SSL verification:
// curl_setopt_array($ch, array(
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_SSL_VERIFYPEER => false
// ));

// // Execute the request and fetch the content
// $content = curl_exec($ch);

// // Check for errors
// if(curl_errno($ch)) {
//     // Handle any errors that occurred
//     echo 'cURL error: ' . curl_error($ch);
// }

// // Close the cURL session
// curl_close($ch);

// // Use the content as needed
// echo $content;
?>
<!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->



<?php
// // Initialize a new cURL session
// $ch = curl_init();

// // Set the URL to fetch
// $url = 'https://miuegypt.edu.eg';
// curl_setopt($ch, CURLOPT_URL, $url);

// // Set any required cURL options
// // For example, to follow redirects and disable SSL verification:
// curl_setopt_array($ch, array(
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_SSL_VERIFYPEER => false
// ));

// // Execute the request and fetch the content
// $content = curl_exec($ch);

// // Check for errors
// if(curl_errno($ch)) {
//     // Handle any errors that occurred
//     echo 'cURL error: ' . curl_error($ch);
// } else {
//     // Create a new directory for the images
//     $dirName = 'directory_' . time();
//     mkdir($dirName);
    
//     // Parse the HTML content using DOMDocument
//     $dom = new DOMDocument();
//     @$dom->loadHTML($content);

//     // Find all image tags
//     $imageTags = $dom->getElementsByTagName('img');

//     // Loop through the images and save them as WebP
//     foreach ($imageTags as $tag) {
//         $imageURL = $tag->getAttribute('src');
//         if (!empty($imageURL)) {
//             // Fetch the image content using cURL
//             $imageContent = file_get_contents($imageURL);

//             // Generate a unique filename for the WebP image
//             $filename = uniqid() . '.webp';

//             // Create a new Imagick object from the image content
//             $imagick = new Imagick();
//             $imagick->readImageBlob($imageContent);

//             // Convert the image to WebP format
//             $imagick->setImageFormat('webp');

//             // Save the image to the new directory
//             $imagick->writeImage($dirName . '/' . $filename);
//         }
//     }
// }

// // Close the cURL session
// curl_close($ch);

// // Output a success message
// echo 'Images have been saved as WebP in directory ' . $dirName;
// ?>



<?php
// // Set the URL of the website you want to scrape images from
// $url = 'https://miuegypt.edu.eg';

// // Set the path to the directory where the converted images will be saved
// $save_dir = 'directory_' . time();

// // Set the quality level for the WebP images (0-100)
// $quality = 80;

// // Initialize a new cURL session
// $ch = curl_init();

// // Set the URL to fetch
// curl_setopt($ch, CURLOPT_URL, $url);

// // Set any required cURL options
// // For example, to follow redirects and disable SSL verification:
// curl_setopt_array($ch, array(
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_SSL_VERIFYPEER => false
// ));

// // Execute the request and fetch the content
// $content = curl_exec($ch);

// // Check for errors
// if(curl_errno($ch)) {
//     // Handle any errors that occurred
//     echo 'cURL error: ' . curl_error($ch);
// } else {
//     // Create a new directory for the images
//     mkdir($save_dir);

//     // Parse the HTML content using DOMDocument
//     $dom = new DOMDocument();
//     @$dom->loadHTML($content);

//     // Find all image tags
//     $imageTags = $dom->getElementsByTagName('img');

//     // Loop through the images and save them as WebP
//     foreach ($imageTags as $tag) {
//         $imageURL = $tag->getAttribute('src');
//         if (!empty($imageURL)) {
//             // Fetch the image content using cURL
//             $imageContent = file_get_contents($imageURL);

//             // Set the file extension based on the SSL status
//             $ext = (strpos($imageURL, 'https') === 0) ? '.webp' : '.jpg';

//             // Set the full path and filename for the saved image
//             $save_path = $save_dir . '/' . uniqid() . $ext;

//             // Create a new Imagick object from the image content
//             $imagick = new Imagick();
//             $imagick->readImageBlob($imageContent);

//             // Convert the image to WebP format
//             $imagick->setImageFormat('webp');

//             // Save the image to the new directory
//             $imagick->writeImage($save_path);

//             // Free up memory
//             $imagick->destroy();
//         }
//     }

//     // Output a success message
//     echo 'Images have been saved as WebP in directory ' . $save_dir;
// }

// // Close the cURL session
// curl_close($ch);
?>


<?php
// // Set the URL to fetch
// $url = 'https://miuegypt.edu.eg';

// // Create a new directory for the images
// $dirName = 'directory_' . time();
// if (!mkdir($dirName)) {
//     die('Failed to create directory ' . $dirName);
// }

// // Initialize a new cURL session
// $ch = curl_init();

// // Set any required cURL options
// // For example, to follow redirects and disable SSL verification:
// curl_setopt_array($ch, array(
//     CURLOPT_URL => $url,
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_SSL_VERIFYPEER => false
// ));

// // Execute the request and fetch the content
// $content = curl_exec($ch);

// // Check for errors
// if(curl_errno($ch)) {
//     // Handle any errors that occurred
//     echo 'cURL error: ' . curl_error($ch);
// } else {
//     // Parse the HTML content using DOMDocument
//     $dom = new DOMDocument();
//     @$dom->loadHTML($content);

//     // Find all image tags
//     $imageTags = $dom->getElementsByTagName('img');

//     // Loop through the images and save them as WebP
//     foreach ($imageTags as $tag) {
//         $imageURL = $tag->getAttribute('src');
//         if (!empty($imageURL)) {
//             // Fetch the image content using cURL
//             $imageContent = file_get_contents($imageURL);

//             if ($imageContent === false) {
//                 echo 'Failed to fetch image from URL ' . $imageURL;
//                 continue;
//             }

//             // Generate a unique filename for the WebP image
//             $filename = uniqid() . '.webp';

//             // Create a new Imagick object from the image content
//             $imagick = new Imagick();
//             $imagick->readImageBlob($imageContent);

//             // Convert the image to WebP format
//             $imagick->setImageFormat('webp');

//             // Save the image to the new directory
//             if (!$imagick->writeImage($dirName . '/' . $filename)) {
//                 echo 'Failed to save image ' . $filename;
//                 continue;
//             }
//         }
//     }

//     // Output a success message
//     echo 'Images have been saved as WebP in directory ' . $dirName;
// }

// // Close the cURL session
// curl_close($ch);
// 
?>
<?php
// Set the URL of the website you want to scrape images from
// $url = 'https://my.clevelandclinic.org/';

// // Set the path to the directory where the converted images will be saved
// $save_dir = 'images/';

// // Set the quality level for the WebP images (0-100)
// $quality = 80;

// // Set the path to the certificate bundle file
// $cert_file = 'cacert.pem';

// // Initialize a new cURL session
// $ch = curl_init();

// // Set the URL to fetch
// curl_setopt($ch, CURLOPT_URL, $url);

// // Set any required cURL options
// // For example, to follow redirects and use a certificate bundle file:
// curl_setopt_array($ch, array(
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_SSL_VERIFYPEER => true,
//     CURLOPT_CAINFO => $cert_file
// ));

// // Execute the request and fetch the content
// $content = curl_exec($ch);

// // Check for errors
// if(curl_errno($ch)) {
//     // Handle any errors that occurred
//     echo 'cURL error: ' . curl_error($ch);
// } else {
//     // Create a new directory for the images
//     $dirName = 'directory_' . time();
//     mkdir($dirName);
    
//     // Parse the HTML content using DOMDocument
//     $dom = new DOMDocument();
//     @$dom->loadHTML($content);

//     // Find all image tags
//     $imageTags = $dom->getElementsByTagName('img');

//     // Loop through the images and save them as WebP
//     foreach ($imageTags as $tag) {
//         $imageURL = $tag->getAttribute('src');
//         if (!empty($imageURL)) {
//             // Fetch the image content using cURL
//             $ch_image = curl_init($imageURL);
//             curl_setopt_array($ch_image, array(
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_SSL_VERIFYPEER => true,
//                 CURLOPT_CAINFO => $cert_file
//             ));
//             $imageContent = curl_exec($ch_image);
//             curl_close($ch_image);

//             // Generate a unique filename for the WebP image
//             $filename = uniqid() . '.webp';

//             // Create a new Imagick object from the image content
//             $imagick = new Imagick();
//             $imagick->readImageBlob($imageContent);

//             // Convert the image to WebP format
//             $imagick->setImageFormat('webp');

//             // Save the image to the new directory
//             $imagick->writeImage($dirName . '/' . $filename);
//         }
//     }
// }

// // Close the cURL session
// curl_close($ch);

// // Output a success message
// echo 'Images have been saved as WebP in directory ' . $dirName;
?>
<?php

// // Set the URL of the website you want to scrape images from
// $url = 'https://miuegypt.edu.eg';

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
$url = 'https://www.google.com/search?q=cats&sxsrf=APwXEdd2QrRyeN_6knbEiMt4ohbchcdiOA:1681802027506&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjsh7rj8LL-AhXEi1wKHa0NAS4Q_AUoAXoECAEQAw&biw=1512&bih=778&dpr=2';

// Set the path to the directory where the converted images will be saved
$dirName = 'images_' . time();
mkdir($dirName);
$save_dir = $dirName . '/';

// Set the quality level for the WebP images (0-100)
$quality = 80;

// Create a new DOMDocument object
$dom = new \DOMDocument();

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
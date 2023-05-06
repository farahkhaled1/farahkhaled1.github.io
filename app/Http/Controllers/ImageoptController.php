<?php


// namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;


// class ImageoptController extends Controller
// {
//     public function index(){
//         return view('website_image');
//     }

// public function imageopt(Request $url){

// // Set the URL of the website you want to scrape images from
// // $url = 'https://miuegypt.edu.eg/';


// $validator = Validator::make($url->all(), [
//     'website_url' => 'required|url',
// ]);

// if ($validator->fails()) {
//     return redirect()->back()->withErrors($validator);
// }

// // $website_url = $request->input('website_url');

// // Set the path to the directory where the converted images will be saved
// // $dirName = 'images_' . time();
// // mkdir($dirName);
// // $save_dir = $dirName . '/';

// // Set the quality level for the WebP images (0-100)
// $quality = 80;

// // Create a new DOMDocument object
// $dom = new \DOMDocument();

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

//     // Get the file extension of the image
//     $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));

//     // Set the full path and filename for the saved image
//     // $save_path = $save_dir . basename($src, '.' . $ext) . '.webp';

//     // Check if the file already exists
//     // if (!file_exists($save_path)) {
//         // Get the image data from the source URL
//         $img_data = file_get_contents($src, false, stream_context_create($options));

//         // Check if the image data is valid
//         if (!$img_data) {
//             echo "Invalid image data: $src\n";
//             continue;
//         }

//         // Create a temporary file to hold the image data
//         $tmp_file = tmpfile();
//         fwrite($tmp_file, $img_data);
//         fseek($tmp_file, 0);

//         // Get the image size from the temporary file
//         $img_info = getimagesize(stream_get_meta_data($tmp_file)['uri']);
//         if (!$img_info) {
//             echo "Invalid image data: $src\n";
//             continue;
//         }

//         // Create a new image from the source data
//         switch ($ext) {
//             case 'jpeg':
//             case 'jpg':
//                 $img = imagecreatefromjpeg(stream_get_meta_data($tmp_file)['uri']);
//                 break;
//             case 'png':
//                 $img = imagecreatefrompng(stream_get_meta_data($tmp_file)['uri']);
//                 break;
//             case 'svg':
//                 $img = imagecreatefromstring($img_data);
//                 break;
//             default:
//                 echo "Unsupported image type: $src\n";
//                 continue 2;
//         }

//         // Save the image as a WebP image
//         // if ($ssl) {
//         //     imagewebp($img, $save_path, $quality);
      
    
//         // } else {
//         //     // Convert the image to WebP format
//         //     $webp_data = imagewebp($img, null, $quality);

//         //     // Save the WebP data to a file
//         //     file_put_contents($save_path, $webp_data);
//         // }

//         // Free up memory
//         imagedestroy($img);
//     }
// // }

// // Output a success message

// // Output a success message
// // echo 'Images have been saved as WebP in directory ' . $dirName;


// header('Location: http://127.0.0.1:8000/dashboard');

// exit; 

// }
// }





// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;
// use simplehtmldom_1_5\simple_html_dom;

// class ImageoptController extends Controller
// {
//     public function index()
//     {
//         return view('website_image');
//     }

//     public function convert(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'website_url' => 'required|url',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator);
//         }

//         $website_url = $request->input('website_url');
//         $image_urls = $this->scrapeImages($website_url);

//         $webp_images = [];
//         foreach ($image_urls as $image_url) {
//             $webp_images[] = $this->convertToWebP($image_url);
//         }

//         // zip the converted images
//         $zip_file = $this->zipImages($webp_images);

//         // return download response
//         return response()->download($zip_file)->deleteFileAfterSend(true);
//     }

//     private function scrapeImages($website_url)
//     {
//         $html = new simple_html_dom();
//         $html->load_file($website_url);
//         $image_urls = [];
//         foreach ($html->find('img') as $img) {
//             $image_urls[] = $img->src;
//         }
//         return $image_urls;
//     }

//     private function convertToWebP($image_url)
//     {
//         $image_data = file_get_contents($image_url);
//         $image_name = basename($image_url);
//         $image = Image::make($image_data);
//         $webp_image = $image->encode('webp', 75);
//         $webp_image_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';
//         Storage::put($webp_image_name, $webp_image);
//         return storage_path('app/' . $webp_image_name);
//     }

//     private function zipImages($image_files)
//     {
//         $zip_name = 'images.zip';
//         $zip_path = storage_path('app/' . $zip_name);
//         $zip = new \ZipArchive;
//         if ($zip->open($zip_path, \ZipArchive::CREATE) === TRUE) {
//             foreach ($image_files as $image_file) {
//                 $zip->addFile($image_file, basename($image_file));
//             }
//             $zip->close();
//         }
//         return $zip_path;
//     }
// }

//-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

// class ImageoptController extends Controller
// {
//     public function index()
//     {
//         return view('website_image');
//     }

//     public function convert(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'url' => 'required|url',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator);
//         }

//         $url = $request->input('url');

//         $dirName = 'images_' . time();
//         mkdir($dirName);
//         $save_dir = $dirName . '/';

//         $quality = 80;

//         $html = file_get_contents($url, false, stream_context_create([
//             'ssl' => [
//                 'verify_peer' => false,
//                 'verify_peer_name' => false,
//             ],
//         ]));

//         libxml_use_internal_errors(true);

//         $dom = new \DOMDocument();
//         $dom->loadHTML($html, LIBXML_NOENT | LIBXML_HTML_NODEFDTD);
//         // $errors = libxml_get_errors();

//         // foreach ($errors as $error) {
//         //     echo "Error: " . $error->message . " at line " . $error->line . "\n";
//         // }

//         $images = $dom->getElementsByTagName('img');
//         foreach ($images as $image) {
//             $src = $image->getAttribute('src');
//             $ssl = (strpos($src, 'https') === 0);
//             $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));
//             $save_path = $save_dir . basename($src, '.' . $ext) . '.webp';

//             if (!file_exists($save_path)) {
//                 $img_data = file_get_contents($src, false, stream_context_create([
//                     'ssl' => [
//                         'verify_peer' => false,
//                         'verify_peer_name' => false,
//                     ],
//                 ]));

//                 if (!$img_data) {
//                     // echo "Invalid image data: $src\n";
//                     continue;
//                 }

//                 $tmp_file = tmpfile();
//                 fwrite($tmp_file, $img_data);
//                 fseek($tmp_file, 0);

//                 $img_info = getimagesize(stream_get_meta_data($tmp_file)['uri']);
//                 if (!$img_info) {
//                     // echo "Invalid image data: $src\n";
//                     continue;
//                 }

//                 $img = $this->createImageFromData($ext, $tmp_file, $src);

//                 if ($ssl) {
//                     imagewebp($img, $save_path, $quality);
//                 } else {
//                     $webp_data = imagewebp($img, null, $quality);
//                     file_put_contents($save_path, $webp_data);
//                 }

//                 imagedestroy($img);
//             }
//         }
//         header('Location: http://127.0.0.1:8000/dashboard');

//         exit; 
     
//     }

//     private function createImageFromData($ext, $tmp_file, $src)
//     {
//         switch ($ext) {
//             case 'jpeg':
//             case 'jpg':
//                 return imagecreatefromjpeg(stream_get_meta_data($tmp_file)['uri']);
//             case 'png':
//                 return imagecreatefrompng(stream_get_meta_data($tmp_file)['uri']);
//             case 'svg':
//                 return imagecreatefromstring(file_get_contents(stream_get_meta_data($tmp_file)['uri']));
//             default:
//                 // echo "Unsupported image type: $src\n";
//                 return null;
//         }
       
        
//     }
    

   
// }
//-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

// class ImageoptController extends Controller
// {
//     public function index()
//     {
//         return view('website_image');
//     }

//     public function convert(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'url' => 'required|url',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator);
//         }

//         $url = $request->input('url');

//         $dirName = 'images_' . time();
//         mkdir($dirName);
//         $save_dir = $dirName . '/';

//         $quality = 80;

//         $html = file_get_contents($url, false, stream_context_create([
//             'ssl' => [
//                 'verify_peer' => false,
//                 'verify_peer_name' => false,
//             ],
//         ]));

//         libxml_use_internal_errors(true);

//         $dom = new \DOMDocument();
//         $dom->loadHTML($html, LIBXML_NOENT | LIBXML_HTML_NODEFDTD);
//         // $errors = libxml_get_errors();

//         // foreach ($errors as $error) {
//         //     echo "Error: " . $error->message . " at line " . $error->line . "\n";
//         // }

//         $images = $dom->getElementsByTagName('img');
//         foreach ($images as $image) {
//             $src = $image->getAttribute('src');
//             if (strpos($src, 'http') !== 0) {
//                 $src = $url . $src;
//             }
//             $ssl = (strpos($src, 'https') === 0);
//             $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));
//             $save_path = $save_dir . basename($src, '.' . $ext) . '.webp';

//             if (!file_exists($save_path)) {
//                 $img_data = file_get_contents($src, false, stream_context_create([
//                     'ssl' => [
//                         'verify_peer' => false,
//                         'verify_peer_name' => false,
//                     ],
//                 ]));

//                 if (!$img_data) {
//                     // echo "Invalid image data: $src\n";
//                     continue;
//                 }

//                 $tmp_file = tmpfile();
//                 fwrite($tmp_file, $img_data);
//                 fseek($tmp_file, 0);

//                 $img_info = getimagesize(stream_get_meta_data($tmp_file)['uri']);
//                 if (!$img_info) {
//                     // echo "Invalid image data: $src\n";
//                     continue;
//                 }
//                 elseif ($img_info[0] == 0 || $img_info[1] == 0) {
//                     // echo "Invalid image dimensions: $src\n";
//                     continue;
//                 }

//                 $img = $this->createImageFromData($ext, $tmp_file, $src);

//                 if ($ssl) {
//                     imagewebp($img, $save_path, $quality);
//                 } else {
//                     $webp_data = imagewebp($img, null, $quality);
//                     file_put_contents($save_path, $webp_data);
//                 }

//                 imagedestroy($img);
//             }
//         }
//         header('Location: http://127.0.0.1:8000/dashboard');

//         exit; 
     
//     }

//     private function createImageFromData($ext, $tmp_file, $src)
//     {
//         switch ($ext) {
//             case 'jpeg':
//             case 'jpg':
//                 return imagecreatefromjpeg(stream_get_meta_data($tmp_file)['uri']);
//             case 'png':
//                 return imagecreatefrompng(stream_get_meta_data($tmp_file)['uri']);
//             case 'svg':
//                 return imagecreatefromstring(file_get_contents(stream_get_meta_data($tmp_file)['uri']));
//             default:
//                 return null;
//             }
//      }
//  }

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------


//  namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;

// class ImageoptController extends Controller
// {
//     public function index()
//     {
//         return view('website_image');
//     }

//     public function convert(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'website_url' => 'required|url',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator);
//         }

//         $website_url = $request->input('website_url');
//         $image_urls = $this->scrapeImages($website_url);

//         $webp_images = [];
//         foreach ($image_urls as $image_url) {
//             $webp_images[] = $this->convertToWebP($image_url);
//         }

//         // zip the converted images
//         $zip_file = $this->zipImages($webp_images);

//         // return download response
//         return response()->download($zip_file)->deleteFileAfterSend(true);
//     }





// private function scrapeImages($website_url)
// {
//     $image_urls = [];
//     $options = array(
//         'ssl' => array(
//             'verify_peer' => false,
//             'verify_peer_name' => false,
//         ),
//     );
//     $html = file_get_contents($website_url, false, stream_context_create($options));
//     $dom = new \DOMDocument();
//     @$dom->loadHTML($html);
//     $img_tags = $dom->getElementsByTagName('img');
//     foreach ($img_tags as $img) {
//         $src = $img->getAttribute('src');
//         if (!empty($src)) {
//             $image_urls[] = $src;
//         }
//     }
//     return $image_urls;
// }


//     private function convertToWebP($image_url)
//     {
//         $image_data = file_get_contents($image_url);
//         $image_name = basename($image_url);
//         $image = Image::make($image_data);
//         $webp_image = $image->encode('webp', 75);
//         $webp_image_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';
//         Storage::put($webp_image_name, $webp_image);
//         return storage_path('app/' . $webp_image_name);
//     }

//     private function zipImages($image_files)
//     {
//         $zip_name = 'images.zip';
//         $zip_path = storage_path('app/' . $zip_name);
//         $zip = new \ZipArchive;
//         if ($zip->open($zip_path, \ZipArchive::CREATE) === TRUE) {
//             foreach ($image_files as $image_file) {
//                 $zip->addFile($image_file, basename($image_file));
//             }
//             $zip->close();
//         }
//         return $zip_path;
//     }
// }





 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;

// class ImageoptController extends Controller
// {
//     public function index()
//     {
//         return view('website_image');
//     }

//     public function convert(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'website_url' => 'required|url',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator);
//         }

//         $website_url = $request->input('website_url');
//         $image_urls = $this->scrapeImages($website_url);

//         $webp_images = [];
//         foreach ($image_urls as $image_url) {
//             $webp_images[] = $this->convertToWebP($image_url);
//         }

//         // zip the converted images
//         $zip_file = $this->zipImages($webp_images);

//         // return download response
//         return response()->download($zip_file)->deleteFileAfterSend(true);
//     }

//     private function scrapeImages($website_url)
//     {
//         $image_urls = [];
//         $options = array(
//             CURLOPT_SSL_VERIFYPEER => false,
//             CURLOPT_SSL_VERIFYHOST => false,
//             CURLOPT_RETURNTRANSFER => true,
//         );
//         $curl = curl_init($website_url);
//         curl_setopt_array($curl, $options);
//         $html = curl_exec($curl);
//         curl_close($curl);
//         $dom = new \DOMDocument();
//         @$dom->loadHTML($html);
//         $img_tags = $dom->getElementsByTagName('img');
//         foreach ($img_tags as $img) {
//             $src = $img->getAttribute('src');
//             if (!empty($src)) {
//                 $image_urls[] = $src;
//             }
//         }
//         return $image_urls;
//     }
//     private function convertToWebP($image_url)
//     {
//         $ch = curl_init($image_url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         $image_data = curl_exec($ch);
//         $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//         curl_close($ch);
    
//         if ($http_status !== 200) {
//             return null;
//         }
    
//         $image_name = basename($image_url);
    
//         // Create an image instance from the binary data
//       // Create an image instance from the binary data
// $image = Image::make($image_data);

// // Encode the image to JPEG format with 75% quality
// $jpeg_data = $image->encode('jpg', 75)->__toString();

// // Return the binary data for the JPEG image
    
//         // Check if the image is valid and can be processed
//         if (!$image->mime()) {
//             return null;
//         }
    
//         // Encode the image to webp format with 75% quality
//         $webp_image = $image->encode('webp', 75);
    
//         // Get the file extension of the original image
//         $ext = pathinfo($image_name, PATHINFO_EXTENSION);
    
//         // Generate a new filename for the webp image
//         $webp_image_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';
    
//         // Save the webp image to disk
//         Storage::put($webp_image_name, $webp_image);
    
//         // Return the path to the saved webp image
//         return storage_path('app/' . $webp_image_name);
//     }
    
//     private function zipImages($image_files)
//     {
//         $zip_name = 'images.zip';
//         $zip_path = storage_path('app/' . $zip_name);
//         $zip = new \ZipArchive;
//         if ($zip->open($zip_path, \ZipArchive::CREATE) === TRUE) {
//             foreach ($image_files as $image_file) {
//                 $zip->addFile($image_file, basename($image_file));
//             }
//             $zip->close();
//         }
//         return $zip_path;
//     }
// }



//  //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
//  //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
//  //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
//  //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------




























//  namespace App\Http\Controllers;
 
//  use Illuminate\Http\Request;
 
//  class ImageoptController extends Controller
//  {

//         public function index()
//     {
//         return view('website_image');
//     }
//      public function convert(Request $request)
//      {
//          $request->validate([
//              'website_url' => 'required|url',
//          ]);
 
//          $website_url = $request->input('website_url');
 
//          $html = $this->getHtml($website_url);
//          $images = $this->getImages($html);
 
//          foreach ($images as $image) {
//              $this->convertImage($image);
//          }
 
//          $zipPath = $this->createZip($images);
 
//          return response()->download($zipPath);
//      }
 
//      private function getHtml($url)
//      {
//          $ch = curl_init($url);
//          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//          $html = curl_exec($ch);
//          curl_close($ch);
//          return $html;
//      }
 
//      private function getImages($html)
//      {
//          $images = [];
//          $doc = new \DOMDocument();
         
//          @$doc->loadHTML($html);
         
//          $imgTags = $doc->getElementsByTagName('img');
//          foreach ($imgTags as $imgTag) {
//              $images[] = $imgTag->getAttribute('src');
//          }
//          return $images;
//      }
//  private function convertImage($imageUrl)
// {
//     $path_parts = pathinfo($imageUrl);
//     $extension = strtolower($path_parts['extension']);

//     if ($extension === 'jpg' || $extension === 'jpeg') {
//         $image = imagecreatefromjpeg($imageUrl);
//     } elseif ($extension === 'png') {
//         $image = imagecreatefrompng($imageUrl);
//     } else {
//         return;
//     }

//     $ch = curl_init($imageUrl);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $imageData = curl_exec($ch);
//     curl_close($ch);

//     $webpPath = $path_parts['dirname'] . '/' . $path_parts['filename'] . '.webp';

//     $webpImage = imagecreatefromstring($imageData);
//     imagewebp($webpImage, $webpPath, 80);

//     imagedestroy($image);
//     imagedestroy($webpImage);
// }

 
//      private function createZip($images)
//      {
//          $zip = new \ZipArchive();
//          $zipName = 'converted_images.zip';
//          $zipPath = public_path($zipName);
//          $zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
 
//          foreach ($images as $image) {
//              $path_parts = pathinfo($image);
//              $webpPath = $path_parts['dirname'] . '/' . $path_parts['filename'] . '.webp';
//              $zip->addFile($webpPath, $path_parts['filename'] . '.webp');
//          }
 
//          $zip->close();
 
//          return $zipPath;
//      }
//  }
 

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------


// namespace App\Http\Controllers;
// use Illuminate\Http\Request;

// use Intervention\Image\Facades\Image;

// class ImageoptController extends Controller
//  {

//         public function index()
//     {
//         return view('website_image');
//     }
//     public function convert (Request $request)
//     {
//         // Get the URL from the user input
//         $url = $request->input('url');

//         // Use cURL to fetch the HTML content of the website
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         $html = curl_exec($ch);
//         curl_close($ch);

//         // Use PHP Simple HTML DOM Parser to parse the HTML content
//         $dom = new \DomDocument();
//         @$dom->loadHTML($html);
//         $xpath = new \DOMXPath($dom);

//         // Find all the image tags in the HTML content
//         $images = $xpath->query('//img');

//         // Loop through each image and download it
//         foreach ($images as $image) {
//             $src = $image->getAttribute('src');

//             // Download the image using cURL
//             $ch = curl_init();
//             curl_setopt($ch, CURLOPT_URL, $src);
//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//             $imageData = curl_exec($ch);
//             curl_close($ch);

//             // Create an Intervention Image instance from the downloaded image data
//             $img = Image::make($imageData);

//             // Convert the image to WebP format
//             $img->encode('webp');

//             // Save the converted image to disk
//             $filename = basename($src);
//             $dirName = 'images_' . time();
//             mkdir($dirName);
//             $save_dir = $dirName . '/';
//             $img->save(public_path($save_dir . $filename));
//         }

//         // Redirect the user back to the form
//         return redirect()->back();
//     }
// }

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;


// class ImageoptController extends Controller
//  {

//         public function index()
//     {
//         return view('website_image');
//     }
//     public function convert(Request $request)
//     {
//         // Get the URL from the user input
//         $url = $request->input('url');

//         // Use cURL to fetch the HTML content of the website
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         $html = curl_exec($ch);

//         // Check if the cURL request was successful
//         if (curl_errno($ch)) {
//             return redirect()->back()->with('error', 'Failed to fetch website content: ' . curl_error($ch));
//         }

//         // Check if the HTML content is not empty
//         if (empty($html)) {
//             return redirect()->back()->with('error', 'Website content is empty');
//         }

//         curl_close($ch);

//         // Use PHP Simple HTML DOM Parser to parse the HTML content
//         $dom = new \DomDocument();
//         @$dom->loadHTML($html);
//         $xpath = new \DOMXPath($dom);

//         // Find all the image tags in the HTML content
//         $images = $xpath->query('//img');

//         // Loop through each image and download it
//         foreach ($images as $image) {
//             $src = $image->getAttribute('src');

//             // Download the image using cURL
//             $ch = curl_init();
//             curl_setopt($ch, CURLOPT_URL, $src);
//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//             $imageData = curl_exec($ch);
//             curl_close($ch);

//             // Create an Intervention Image instance from the downloaded image data
//             $img = Image::make($imageData);

//             // Convert the image to WebP format
//             $img->encode('webp');

//             // Save the converted image to disk
//             $filename = basename($src);
//             $img->save(public_path('images/' . $filename));
//         }

//         // Redirect the user back to the form
//         return redirect()->back()->with('success', 'Images downloaded successfully');
//     }
// }


 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 



//  namespace App\Http\Controllers;
 
//  use Illuminate\Http\Request;
//  use Illuminate\Support\Facades\Storage;
//  use GuzzleHttp\Client;
//  use Symfony\Component\DomCrawler\Crawler;
 
//  class ImageoptController extends Controller
//  {
//      public function index()
//      {
//          return view('website_image');
//      }
 
//      public function convert(Request $request)
//      {
//          // Validate the form input
//          $validatedData = $request->validate([
//              'url' => 'required|url'
//          ]);
 
//          // Get the website URL from the form input
//          $websiteUrl = $validatedData['url'];
 
//          // Scrape all the images from the website
//          $client = new Client();
//          $response = $client->get($websiteUrl);
//          $html = $response->getBody()->getContents();
//          $crawler = new Crawler($html);
//          $images = $crawler->filter('img')->extract(['src']);
 
//          // Convert all the scraped images to webp format
//          $convertedImages = [];
//          foreach ($images as $image) {
//              $imageUrl = $this->getAbsoluteUrl($image, $websiteUrl);
//              $imageContent = $this->getImageContent($imageUrl);
//              if ($imageContent !== false) {
//                  $convertedImageContent = $this->convertToWebp($imageContent);
//                  $convertedImages[] = [
//                      'name' => basename($imageUrl),
//                      'content' => $convertedImageContent
//                  ];
//              }
//          }
 
//          // Save the converted images to a downloadable file
//          if (count($convertedImages) > 0) {
//              $fileName = 'webp_images.zip';
//              $zip = new \ZipArchive();
//              if ($zip->open(storage_path('app/' . $fileName), \ZipArchive::CREATE) === true) {
//                  foreach ($convertedImages as $convertedImage) {
//                      $zip->addFromString($convertedImage['name'], $convertedImage['content']);
//                  }
//                  $zip->close();
//              }
//              return response()->download(storage_path('app/' . $fileName))->deleteFileAfterSend();
//          } else {
//              return back()->with('error', 'No images found on the provided URL or failed to download images.');
//          }
//      }
 
//      private function getAbsoluteUrl($url, $baseUrl)
//      {
//          if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
//              return $url;
//          }
//          if (strpos($url, '/') === 0) {
//              return rtrim($baseUrl, '/') . $url;
//          }
//          return $baseUrl . '/' . $url;
//      }
 
//      private function getImageContent($imageUrl)
//      {
//          $client = new Client();
//          try {
//              $response = $client->get($imageUrl);
//              return $response->getBody()->getContents();
//          } catch (\Exception $e) {
//              return false;
//          }
//      }
 
//      private function convertToWebp($imageContent)
//      {
//          $imagick = new \Imagick();
//          $imagick->readImageBlob($imageContent);
//          $imagick->setImageFormat('webp');
//          return $imagick->getImageBlob();
//      }
//  }
 



// namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;


// class ImageoptController extends Controller
// {
//     public function index(){
//         return view('website_image');
//     }

// public function imageopt(Request $url){

// // Set the URL of the website you want to scrape images from
// // $url = 'https://miuegypt.edu.eg/';


// $validator = Validator::make($url->all(), [
//     'website_url' => 'required|url',
// ]);

// if ($validator->fails()) {
//     return redirect()->back()->withErrors($validator);
// }

// // $website_url = $request->input('website_url');

// // Set the path to the directory where the converted images will be saved
// // $dirName = 'images_' . time();
// // mkdir($dirName);
// // $save_dir = $dirName . '/';

// // Set the quality level for the WebP images (0-100)
// $quality = 80;

// // Create a new DOMDocument object
// $dom = new \DOMDocument();

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

//     // Get the file extension of the image
//     $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));

//     // Set the full path and filename for the saved image
//     // $save_path = $save_dir . basename($src, '.' . $ext) . '.webp';

//     // Check if the file already exists
//     // if (!file_exists($save_path)) {
//         // Get the image data from the source URL
//         $img_data = file_get_contents($src, false, stream_context_create($options));

//         // Check if the image data is valid
//         if (!$img_data) {
//             echo "Invalid image data: $src\n";
//             continue;
//         }

//         // Create a temporary file to hold the image data
//         $tmp_file = tmpfile();
//         fwrite($tmp_file, $img_data);
//         fseek($tmp_file, 0);

//         // Get the image size from the temporary file
//         $img_info = getimagesize(stream_get_meta_data($tmp_file)['uri']);
//         if (!$img_info) {
//             echo "Invalid image data: $src\n";
//             continue;
//         }

//         // Create a new image from the source data
//         switch ($ext) {
//             case 'jpeg':
//             case 'jpg':
//                 $img = imagecreatefromjpeg(stream_get_meta_data($tmp_file)['uri']);
//                 break;
//             case 'png':
//                 $img = imagecreatefrompng(stream_get_meta_data($tmp_file)['uri']);
//                 break;
//             case 'svg':
//                 $img = imagecreatefromstring($img_data);
//                 break;
//             default:
//                 echo "Unsupported image type: $src\n";
//                 continue 2;
//         }

//         // Save the image as a WebP image
//         // if ($ssl) {
//         //     imagewebp($img, $save_path, $quality);
      
    
//         // } else {
//         //     // Convert the image to WebP format
//         //     $webp_data = imagewebp($img, null, $quality);

//         //     // Save the WebP data to a file
//         //     file_put_contents($save_path, $webp_data);
//         // }

//         // Free up memory
//         imagedestroy($img);
//     }
// // }

// // Output a success message

// // Output a success message
// // echo 'Images have been saved as WebP in directory ' . $dirName;


// header('Location: http://127.0.0.1:8000/dashboard');

// exit; 

// }
// }





// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;
// use simplehtmldom_1_5\simple_html_dom;

// class ImageoptController extends Controller
// {
//     public function index()
//     {
//         return view('website_image');
//     }

//     public function convert(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'website_url' => 'required|url',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator);
//         }

//         $website_url = $request->input('website_url');
//         $image_urls = $this->scrapeImages($website_url);

//         $webp_images = [];
//         foreach ($image_urls as $image_url) {
//             $webp_images[] = $this->convertToWebP($image_url);
//         }

//         // zip the converted images
//         $zip_file = $this->zipImages($webp_images);

//         // return download response
//         return response()->download($zip_file)->deleteFileAfterSend(true);
//     }

//     private function scrapeImages($website_url)
//     {
//         $html = new simple_html_dom();
//         $html->load_file($website_url);
//         $image_urls = [];
//         foreach ($html->find('img') as $img) {
//             $image_urls[] = $img->src;
//         }
//         return $image_urls;
//     }

//     private function convertToWebP($image_url)
//     {
//         $image_data = file_get_contents($image_url);
//         $image_name = basename($image_url);
//         $image = Image::make($image_data);
//         $webp_image = $image->encode('webp', 75);
//         $webp_image_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';
//         Storage::put($webp_image_name, $webp_image);
//         return storage_path('app/' . $webp_image_name);
//     }

//     private function zipImages($image_files)
//     {
//         $zip_name = 'images.zip';
//         $zip_path = storage_path('app/' . $zip_name);
//         $zip = new \ZipArchive;
//         if ($zip->open($zip_path, \ZipArchive::CREATE) === TRUE) {
//             foreach ($image_files as $image_file) {
//                 $zip->addFile($image_file, basename($image_file));
//             }
//             $zip->close();
//         }
//         return $zip_path;
//     }
// }

//-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

// class ImageoptController extends Controller
// {
//     public function index()
//     {
//         return view('website_image');
//     }

//     public function convert(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'url' => 'required|url',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator);
//         }

//         $url = $request->input('url');

//         $dirName = 'images_' . time();
//         mkdir($dirName);
//         $save_dir = $dirName . '/';

//         $quality = 80;

//         $html = file_get_contents($url, false, stream_context_create([
//             'ssl' => [
//                 'verify_peer' => false,
//                 'verify_peer_name' => false,
//             ],
//         ]));

//         libxml_use_internal_errors(true);

//         $dom = new \DOMDocument();
//         $dom->loadHTML($html, LIBXML_NOENT | LIBXML_HTML_NODEFDTD);
//         // $errors = libxml_get_errors();

//         // foreach ($errors as $error) {
//         //     echo "Error: " . $error->message . " at line " . $error->line . "\n";
//         // }

//         $images = $dom->getElementsByTagName('img');
//         foreach ($images as $image) {
//             $src = $image->getAttribute('src');
//             $ssl = (strpos($src, 'https') === 0);
//             $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));
//             $save_path = $save_dir . basename($src, '.' . $ext) . '.webp';

//             if (!file_exists($save_path)) {
//                 $img_data = file_get_contents($src, false, stream_context_create([
//                     'ssl' => [
//                         'verify_peer' => false,
//                         'verify_peer_name' => false,
//                     ],
//                 ]));

//                 if (!$img_data) {
//                     // echo "Invalid image data: $src\n";
//                     continue;
//                 }

//                 $tmp_file = tmpfile();
//                 fwrite($tmp_file, $img_data);
//                 fseek($tmp_file, 0);

//                 $img_info = getimagesize(stream_get_meta_data($tmp_file)['uri']);
//                 if (!$img_info) {
//                     // echo "Invalid image data: $src\n";
//                     continue;
//                 }

//                 $img = $this->createImageFromData($ext, $tmp_file, $src);

//                 if ($ssl) {
//                     imagewebp($img, $save_path, $quality);
//                 } else {
//                     $webp_data = imagewebp($img, null, $quality);
//                     file_put_contents($save_path, $webp_data);
//                 }

//                 imagedestroy($img);
//             }
//         }
//         header('Location: http://127.0.0.1:8000/dashboard');

//         exit; 
     
//     }

//     private function createImageFromData($ext, $tmp_file, $src)
//     {
//         switch ($ext) {
//             case 'jpeg':
//             case 'jpg':
//                 return imagecreatefromjpeg(stream_get_meta_data($tmp_file)['uri']);
//             case 'png':
//                 return imagecreatefrompng(stream_get_meta_data($tmp_file)['uri']);
//             case 'svg':
//                 return imagecreatefromstring(file_get_contents(stream_get_meta_data($tmp_file)['uri']));
//             default:
//                 // echo "Unsupported image type: $src\n";
//                 return null;
//         }
       
        
//     }
    

   
// }
//-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

// class ImageoptController extends Controller
// {
//     public function index()
//     {
//         return view('website_image');
//     }

//     public function convert(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'url' => 'required|url',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator);
//         }

//         $url = $request->input('url');

//         $dirName = 'images_' . time();
//         mkdir($dirName);
//         $save_dir = $dirName . '/';

//         $quality = 80;

//         $html = file_get_contents($url, false, stream_context_create([
//             'ssl' => [
//                 'verify_peer' => false,
//                 'verify_peer_name' => false,
//             ],
//         ]));

//         libxml_use_internal_errors(true);

//         $dom = new \DOMDocument();
//         $dom->loadHTML($html, LIBXML_NOENT | LIBXML_HTML_NODEFDTD);
//         // $errors = libxml_get_errors();

//         // foreach ($errors as $error) {
//         //     echo "Error: " . $error->message . " at line " . $error->line . "\n";
//         // }

//         $images = $dom->getElementsByTagName('img');
//         foreach ($images as $image) {
//             $src = $image->getAttribute('src');
//             if (strpos($src, 'http') !== 0) {
//                 $src = $url . $src;
//             }
//             $ssl = (strpos($src, 'https') === 0);
//             $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));
//             $save_path = $save_dir . basename($src, '.' . $ext) . '.webp';

//             if (!file_exists($save_path)) {
//                 $img_data = file_get_contents($src, false, stream_context_create([
//                     'ssl' => [
//                         'verify_peer' => false,
//                         'verify_peer_name' => false,
//                     ],
//                 ]));

//                 if (!$img_data) {
//                     // echo "Invalid image data: $src\n";
//                     continue;
//                 }

//                 $tmp_file = tmpfile();
//                 fwrite($tmp_file, $img_data);
//                 fseek($tmp_file, 0);

//                 $img_info = getimagesize(stream_get_meta_data($tmp_file)['uri']);
//                 if (!$img_info) {
//                     // echo "Invalid image data: $src\n";
//                     continue;
//                 }
//                 elseif ($img_info[0] == 0 || $img_info[1] == 0) {
//                     // echo "Invalid image dimensions: $src\n";
//                     continue;
//                 }

//                 $img = $this->createImageFromData($ext, $tmp_file, $src);

//                 if ($ssl) {
//                     imagewebp($img, $save_path, $quality);
//                 } else {
//                     $webp_data = imagewebp($img, null, $quality);
//                     file_put_contents($save_path, $webp_data);
//                 }

//                 imagedestroy($img);
//             }
//         }
//         header('Location: http://127.0.0.1:8000/dashboard');

//         exit; 
     
//     }

//     private function createImageFromData($ext, $tmp_file, $src)
//     {
//         switch ($ext) {
//             case 'jpeg':
//             case 'jpg':
//                 return imagecreatefromjpeg(stream_get_meta_data($tmp_file)['uri']);
//             case 'png':
//                 return imagecreatefrompng(stream_get_meta_data($tmp_file)['uri']);
//             case 'svg':
//                 return imagecreatefromstring(file_get_contents(stream_get_meta_data($tmp_file)['uri']));
//             default:
//                 return null;
//             }
//      }
//  }

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------


//  namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;

// class ImageoptController extends Controller
// {
//     public function index()
//     {
//         return view('website_image');
//     }

//     public function convert(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'website_url' => 'required|url',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator);
//         }

//         $website_url = $request->input('website_url');
//         $image_urls = $this->scrapeImages($website_url);

//         $webp_images = [];
//         foreach ($image_urls as $image_url) {
//             $webp_images[] = $this->convertToWebP($image_url);
//         }

//         // zip the converted images
//         $zip_file = $this->zipImages($webp_images);

//         // return download response
//         return response()->download($zip_file)->deleteFileAfterSend(true);
//     }





// private function scrapeImages($website_url)
// {
//     $image_urls = [];
//     $options = array(
//         'ssl' => array(
//             'verify_peer' => false,
//             'verify_peer_name' => false,
//         ),
//     );
//     $html = file_get_contents($website_url, false, stream_context_create($options));
//     $dom = new \DOMDocument();
//     @$dom->loadHTML($html);
//     $img_tags = $dom->getElementsByTagName('img');
//     foreach ($img_tags as $img) {
//         $src = $img->getAttribute('src');
//         if (!empty($src)) {
//             $image_urls[] = $src;
//         }
//     }
//     return $image_urls;
// }


//     private function convertToWebP($image_url)
//     {
//         $image_data = file_get_contents($image_url);
//         $image_name = basename($image_url);
//         $image = Image::make($image_data);
//         $webp_image = $image->encode('webp', 75);
//         $webp_image_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';
//         Storage::put($webp_image_name, $webp_image);
//         return storage_path('app/' . $webp_image_name);
//     }

//     private function zipImages($image_files)
//     {
//         $zip_name = 'images.zip';
//         $zip_path = storage_path('app/' . $zip_name);
//         $zip = new \ZipArchive;
//         if ($zip->open($zip_path, \ZipArchive::CREATE) === TRUE) {
//             foreach ($image_files as $image_file) {
//                 $zip->addFile($image_file, basename($image_file));
//             }
//             $zip->close();
//         }
//         return $zip_path;
//     }
// }





 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------


 //HERE//
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;

// class ImageoptController extends Controller
// {
//     public function index()
//     {
//         return view('website_image');
//     }

//     public function convert(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'website_url' => 'required|url',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator);
//         }

//         $website_url = $request->input('website_url');
//         $image_urls = $this->scrapeImages($website_url);

//         $webp_images = [];
//         foreach ($image_urls as $image_url) {
//             $webp_images[] = $this->convertToWebP($image_url);
//         }

//         // zip the converted images
//         $zip_file = $this->zipImages($webp_images);

//         // return download response
//         return response()->download($zip_file)->deleteFileAfterSend(true);
//     }
    
//     private function scrapeImages($website_url)
//     {
//         $image_urls = [];
//         $options = array(
//             CURLOPT_SSL_VERIFYPEER => false,
//             CURLOPT_SSL_VERIFYHOST => false,
//             CURLOPT_RETURNTRANSFER => true,
//         );
//         // libxml_use_internal_errors(true);
//         $curl = curl_init($website_url);
//         curl_setopt_array($curl, $options);
//         $html = curl_exec($curl);
//         curl_close($curl);
//         $dom = new \DOMDocument();
//         // libxml_use_internal_errors(false);
//         @$dom->loadHTML($html);
//         $img_tags = $dom->getElementsByTagName('img');
//         foreach ($img_tags as $img) {
//             $src = $img->getAttribute('src');
//             if (!empty($src)) {
//                 $image_urls[] = $src;
//             }
//         }
//         return $image_urls;
//     }
//     private function convertToWebP($image_url)
//     {
//         $ch = curl_init($image_url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         $image_data = curl_exec($ch);
//         $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//         curl_close($ch);
    
//         if ($http_status !== 200) {
//             return null;
//         }
    
//         $image_name = basename($image_url);
    
//         // Create an image instance from the binary data
//       // Create an image instance from the binary data
// $image = Image::make($image_data);

// // Encode the image to JPEG format with 75% quality
// $jpeg_data = $image->encode('jpg', 75)->__toString();

// // Return the binary data for the JPEG image
    
//         // Check if the image is valid and can be processed
//         if (!$image->mime()) {
//             return null;
//         }
    
//         // Encode the image to webp format with 75% quality
//         $webp_image = $image->encode('webp', 75);
    
//         // Get the file extension of the original image
//         $ext = pathinfo($image_name, PATHINFO_EXTENSION);
    
//         // Generate a new filename for the webp image
//         $webp_image_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';
    
//         // Save the webp image to disk
//         Storage::put($webp_image_name, $webp_image);
    
//         // Return the path to the saved webp image
//         return storage_path('app/' . $webp_image_name);
//     }
    
//     private function zipImages($image_files)
//     {
//         $zip_name = 'images.zip';
//         $zip_path = storage_path('app/' . $zip_name);
//         $zip = new \ZipArchive;
//         if ($zip->open($zip_path, \ZipArchive::CREATE) === TRUE) {
//             foreach ($image_files as $image_file) {
//                 $zip->addFile($image_file, basename($image_file));
//             }
//             $zip->close();
//         }
//         return $zip_path;
//     }
// }

////////////////////////////////////////////
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;
class ImageoptController extends Controller
{
    public function index()
    {
        return view('imageopt');
    }

    public function convert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $website_url = $request->input('website_url');
        $image_urls = $this->scrapeImages($website_url);

        $webp_images = [];
        foreach ($image_urls as $image_url) {
            $webp_images[] = $this->convertToWebP($image_url);
        }

        // zip the converted images
        
    
        

        $zip_file = $this->zipImages($webp_images);

        // return download response
        return response()->download($zip_file)->deleteFileAfterSend(true);
        // $response = response()->download(storage_path('app/images.zip'))->deleteFileAfterSend(true);
        //  return $response;
    }

    private function scrapeImages($website_url)
    {
        $image_urls = [];
        $options = array(
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_RETURNTRANSFER => true,
        );
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $website_url,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => [
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
            ],
        ]);
        curl_setopt_array($curl, $options);
        $html = curl_exec($curl);
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($http_status !== 200) {
            return $image_urls;
        }

        $dom = new \DOMDocument();
        @$dom->loadHTML($html);
        $img_tags = $dom->getElementsByTagName('img');
        foreach ($img_tags as $img) {
            $src = $img->getAttribute('src');
            if (!empty($src)) {
                // handle relative URLs
                if (strpos($src, 'http') !== 0) {
                    $src = $website_url . '/' . ltrim($src, '/');
                }
                $image_urls[] = $src;
            }
        }
        return $image_urls;
    }
    // private function convertToWebP($image_url)
    // {
    //     // Check if image URL is empty or invalid
    //     if (empty($image_url) || !filter_var($image_url, FILTER_VALIDATE_URL)) {
    //         return null;
    //     }
    
    //     $ch = curl_init($image_url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $image_data = curl_exec($ch);
    //     $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //     curl_close($ch);
    
    //     // Check if image download was successful
    //     if ($http_status !== 200 || empty($image_data)) {
    //         return null;
    //     }
    
    //     $image_name = basename($image_url);
    
    //     // Create an image instance from the binary data
    //     $image = Image::make($image_data);
    
    //     // Check if image can be converted to WebP format
    //     if (!$image->mime() || !in_array($image->mime(), ['image/jpeg', 'image/png'])) {
    //         return null;
    //     }
    
    //     // Encode the image to WebP format with 75% quality
    //     $webp_image = $image->encode('webp', 75);
    
    //     // Get the file extension of the original image
    //     $ext = pathinfo($image_name, PATHINFO_EXTENSION);
    
    //     // Generate a new filename for the WebP image
    //     $webp_image_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';
    
    //     // Save the WebP image to disk
    //     Storage::put($webp_image_name, $webp_image);
    
    //     // Return the path to the saved WebP image
    //     return storage_path('app/' . $webp_image_name);
    // }
//     private function convertToWebP($image_url)
// {
//     $ch = curl_init($image_url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $image_data = curl_exec($ch);
//     $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//     curl_close($ch);

//     if ($http_status !== 200) {
//         return null;
//     }

//     $image_name = basename($image_url);

//     // Create a temporary file to store the downloaded image
//     $tmp_file = tempnam(sys_get_temp_dir(), 'img');
//     file_put_contents($tmp_file, $image_data);

//     // Create an instance of Symfony\Component\HttpFoundation\File\Stream
//     $stream = new \Symfony\Component\HttpFoundation\File\Stream($tmp_file);

//     // Create an image instance from the file stream
//     $image = Image::make($stream);

//     // Encode the image to webp format with 75% quality
//     $webp_image = $image->encode('webp', 75);

//     // Get the file extension of the original image
//     $ext = pathinfo($image_name, PATHINFO_EXTENSION);

//     // Generate a new filename for the WebP image
//     $webp_image_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';

//     // Save the WebP image to disk
//     Storage::put($webp_image_name, $webp_image);

//     // Return the path to the saved WebP image
//     return storage_path('app/' . $webp_image_name);
// }

private function convertToWebP($image_url)
{
    $ch = curl_init($image_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $image_data = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_status !== 200) {
        return null;
    }

    $image_name = basename($image_url);

    // Create a temporary file to store the downloaded image
    $tmp_file = tempnam(sys_get_temp_dir(), 'img');
    file_put_contents($tmp_file, $image_data);

    // Check if the image file was created successfully
    if (!$tmp_file || !file_exists($tmp_file)) {
        return null;
    }

    try {
        // Create an instance of Intervention\Image\Image
        $image = Image::make($tmp_file);

        // Check if the image can be converted to WebP format
        if (!$image->mime() || !in_array($image->mime(), ['image/jpeg', 'image/png'])) {
            return null;
        }

        // Encode the image to WebP format with 75% quality
        $webp_image = $image->encode('webp', 75);

        // Generate a new filename for the WebP image
        $webp_image_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';

        // Save the WebP image to disk
        Storage::put($webp_image_name, $webp_image);

        // Return the path to the saved WebP image
        return storage_path('app/' . $webp_image_name);

    } catch (\Exception $e) {
        // Handle any exceptions that occur during image processing
        return null;
    } finally {
        // Remove the temporary image file
        if (file_exists($tmp_file)) {
            unlink($tmp_file);
        }
    }
}

    ////MAIN ONE WORKING ONE PERFECT ONE EL HWA TA7T EL LINE DA///
    // private function convertToWebP($image_url)
    // {
    //     $ch = curl_init($image_url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $image_data = curl_exec($ch);
    //     $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //     curl_close($ch);

    //     if ($http_status !== 200) {
    //         return null;
    //     }

    //     $image_name = basename($image_url);

    //     // Create an image instance from the binary data
    //     $image = Image::make($image_data);

    //     // Encode the image to webp format with 75% quality
    //     $webp_image = $image->encode('webp', 75);

    //     // Get the file extension of the original image
    //     $ext = pathinfo($image_name, PATHINFO_EXTENSION);

    //     // Generate a new filename for the webp image
    //     $webp_image_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';
       
    
    //     // Save the webp image to disk
    //     Storage::put($webp_image_name, $webp_image);
    
    //     // Return the path to the saved webp image
    //     return storage_path('app/' . $webp_image_name);
    // }
    
    // private function zipImages($image_files)
    // {
    //     $zip_name = 'images.zip';
    //     $zip_path = storage_path('app/' . $zip_name);
    //     $zip = new \ZipArchive;
    //     if ($zip->open($zip_path, \ZipArchive::CREATE) === TRUE) {
    //         foreach ($image_files as $image_file) {
    //             $zip->addFile($image_file, basename($image_file));
    //         }
    //         $zip->close();
    //     }
    //     return $zip_path;
    // }

//     private function zipImages($image_files)
// {
//     if (empty($image_files)) {
//         return null;
//     }
    
//     $zip_name = 'images.zip';
//     $zip_path = storage_path('app/' . $zip_name);
//     $zip = new \ZipArchive;
//     if ($zip->open($zip_path, \ZipArchive::CREATE) === TRUE) {
//         foreach ($image_files as $image_file) {
//             $zip->addFile($image_file, basename($image_file));
//         }
//         $zip->close();
//     }
//     return $zip_path;
// }
// private function zipImages($webp_images)
// {
//     $zip_file = tempnam(sys_get_temp_dir(), 'zip');

//     $zip = new \ZipArchive();
//     if ($zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
//         throw new \Exception("Unable to create ZIP file");
//     }

//     foreach ($webp_images as $webp_image) {
//         if (!file_exists($webp_image)) {
//             throw new \Exception("File does not exist: $webp_image");
//         }
//         $zip->addFile($webp_image, basename($webp_image));
//     }

//     $zip->close();

//     return $zip_file;
// }

////////////////// this one is the perfect one////////////////////////
private function zipImages($webp_images)
{
    $zip = new \ZipArchive();
    $zip_file = storage_path('app/images.zip');

    if ($zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
        foreach ($webp_images as $webp_image) {
            // Skip null values returned from convertToWebP()
            if ($webp_image !== null && file_exists($webp_image)) {
                $zip->addFile($webp_image, basename($webp_image));
            }
        }
        $zip->close();
        return $zip_file;
    } else {
        return null;
    }
}



// function unzip_images($zipFile, $destinationFolder) {
//     // Check if the zip file exists
//     if (!file_exists($zipFile)) {
//         throw new Exception("Zip file not found");
//     }

//     // Create the destination folder if it does not exist
//     if (!file_exists($destinationFolder)) {
//         mkdir($destinationFolder, 0777, true);
//     }

//     // Create a new ZipArchive object
//     $zip = new ZipArchive;

//     // Open the zip file
//     if ($zip->open($zipFile) === true) {
//         // Extract the files to the destination folder
//         $zip->extractTo($destinationFolder);

//         // Close the zip file
//         $zip->close();
//     } else {
//         throw new Exception("Error opening zip file");
//     }
// }






// private function zipImages($webp_images)
// {
//     $zip_file = tempnam(sys_get_temp_dir(), 'zip');

//     $zip = new \ZipArchive();
//     if ($zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
//         throw new \Exception("Unable to create ZIP file");
//     }

//     foreach ($webp_images as $webp_image) {
//         if (!file_exists($webp_image)) {
//             throw new \Exception("File does not exist: $webp_image");
//         }
//         $zip->addFile($webp_image, basename($webp_image));
//     }

//     $zip->close();

//     return $zip_file;
// }

// // private function zipImages($image_files)
// // {
// //     if (empty($image_files)) {
// //         return null;
// //     }
    
// //     $zip_name = 'images.zip';
// //     $zip_path = storage_path('app/' . $zip_name);
// //     $zip = new \ZipArchive;
// //     if ($zip->open($zip_path, \ZipArchive::CREATE) === TRUE) {
// //         foreach ($image_files as $image_file) {
// //             if (!empty($image_file)) {
// //                 if (!file_exists($image_file)) {
// //                     echo "File not found: $image_file<br>";
// //                 } elseif (!$zip->addFile($image_file, basename($image_file))) {
// //                     echo "Failed to add file: $image_file<br>";
// //                 }
// //             } else {
// //                 echo "Empty file path<br>";
// //             }
// //         }
// //         $zip->close();
// //         return $zip_path;
// //     } else {
// //         echo "Failed to create zip file: $zip_path<br>";
// //         return null;
// //     }
// // }

}

////////////////////////////////////////

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;
// use PHPHtmlParser\Dom;
// class ImageoptController extends Controller
// {
//     public function index()
//     {
//         return view('website_image');
//     }
//     // public function convert(Request $request)
//     //     {
//     //         $validator = Validator::make($request->all(), [
//     //             'website_url' => 'required|url',
//     //         ]);
    
//     //         if ($validator->fails()) {
//     //             return redirect()->back()->withErrors($validator);
//     //         }
    
//     //         $website_url = $request->input('website_url');
//     //         $image_urls = $this->scrapeImages($website_url);
    
//     //         $webp_images = [];
//     //         foreach ($image_urls as $image_url) {
//     //             $webp_images[] = $this->convertToWebP($image_url);
//     //         }
    
//     //         // zip the converted images
//     //         $zip_file = $this->zipImages($webp_images);
    
//     //         // return download response
//     //         return response()->download($zip_file)->deleteFileAfterSend(true);
//     //     }
//     // public function convert(Request $request)
//     // {
//     //     $website_url = $request->input('website_url');
//     //     $image_urls = $this->scrapeImages($website_url);

//     //     $webp_images = [];
//     //     foreach ($image_urls as $image_url) {
//     //         $webp_images[] = $this->convertToWebP($image_url);
//     //     }

//     //     // zip the converted images
//     //     $zip_file = $this->zipImages($webp_images);

//     //     // return download response
//     //     return response()->download($zip_file)->deleteFileAfterSend(true);
//     // }
//     public function convert(Request $request)
// {
//     try {
//         // Validate the input
//         $validator = Validator::make($request->all(), [
//             'website_url' => 'required|url',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator);
//         }

//         // Scrape the images from the website
//         $website_url = $request->input('website_url');
//         $image_urls = $this->scrapeImages($website_url);

//         // Convert the images to webp format
//         $webp_images = [];
//         foreach ($image_urls as $image_url) {
//             $webp_image = $this->convertToWebP($image_url);
//             if ($webp_image) {
//                 $webp_images[] = $webp_image;
//             }
//         }

//         // Zip the converted images
//         $zip_file = $this->zipImages($webp_images);

//         // Return the download response
//         return response()->download($zip_file)->deleteFileAfterSend(true);
//     } catch (Exception $e) {
//         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
//     }
// }


//     private function scrapeImages($website_url)
//     {
//         $image_urls = [];
//         $options = array(
//             CURLOPT_SSL_VERIFYPEER => false,
//             CURLOPT_SSL_VERIFYHOST => false,
//             CURLOPT_RETURNTRANSFER => true,
//         );
//         try {
//             $curl = curl_init($website_url);
//             curl_setopt_array($curl, $options);
//             $html = curl_exec($curl);
//             curl_close($curl);
//             $dom = new \DOMDocument();
//             $dom->loadHTML($html);
//             $img_tags = $dom->getElementsByTagName('img');
//             foreach ($img_tags as $img) {
//                 $src = $img->getAttribute('src');
//                 if (!empty($src)) {
//                     $image_urls[] = $src;
//                 }
//             }
//         } catch (\Exception $e) {
//             // handle exception here
//         }
//         return $image_urls;
//     }
  
// //     private function scrapeImages($website_url)
// // {
// //     $image_urls = [];
// //     $options = array(
// //         CURLOPT_SSL_VERIFYPEER => false,
// //         CURLOPT_SSL_VERIFYHOST => false,
// //         CURLOPT_RETURNTRANSFER => true,
// //     );
// //     $curl = curl_init($website_url);
// //     curl_setopt_array($curl, $options);
// //     $html = curl_exec($curl);
// //     curl_close($curl);

// //     $dom = new Dom;
// //     $dom->load($html);

// //     foreach ($dom->find('img') as $img) {
// //         $src = $img->getAttribute('src');
// //         if (!empty($src)) {
// //             $image_urls[] = $src;
// //         }
// //     }
// //     return $image_urls;
// // }

//     private function convertToWebP($image_url)
//     {
//         $ch = curl_init($image_url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         $image_data = curl_exec($ch);
//         $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//         curl_close($ch);

//         if ($http_status !== 200) {
//             return null;
//         }

//         $image_name = basename($image_url);

//         // Create an image instance from the binary data
//         $image = Image::make($image_data);

//         // Encode the image to JPEG format with 75% quality
//         $jpeg_data = $image->encode('jpg', 75)->__toString();

//         // Return the binary data for the JPEG image

//         // Check if the image is valid and can be processed
//         if (!$image->mime()) {
//             return null;
//         }

//         // Encode the image to webp format with 75% quality
//         $webp_image = $image->encode('webp', 75);

//         // Get the file extension of the original image
//         $ext = pathinfo($image_name, PATHINFO_EXTENSION);

//         // Generate a new filename for the webp image
//         $webp_image_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';
    
//         // Save the webp image to disk
//         Storage::put($webp_image_name, $webp_image);
    
//         // Return the path to the saved webp image
//         return storage_path('app/' . $webp_image_name);
//     }
    
//     private function zipImages($image_files)
//     {
//         $zip_name = 'images.zip';
//         $zip_path = storage_path('app/' . $zip_name);
//         $zip = new \ZipArchive;
//         if ($zip->open($zip_path, \ZipArchive::CREATE) === TRUE) {
//             foreach ($image_files as $image_file) {
//                 $zip->addFile($image_file, basename($image_file));
//             }
//             $zip->close();
//         }
//         return $zip_path;
//     }
// }

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------




























//  namespace App\Http\Controllers;
 
//  use Illuminate\Http\Request;
 
//  class ImageoptController extends Controller
//  {

//         public function index()
//     {
//         return view('website_image');
//     }
//      public function convert(Request $request)
//      {
//          $request->validate([
//              'website_url' => 'required|url',
//          ]);
 
//          $website_url = $request->input('website_url');
 
//          $html = $this->getHtml($website_url);
//          $images = $this->getImages($html);
 
//          foreach ($images as $image) {
//              $this->convertImage($image);
//          }
 
//          $zipPath = $this->createZip($images);
 
//          return response()->download($zipPath);
//      }
 
//      private function getHtml($url)
//      {
//          $ch = curl_init($url);
//          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//          $html = curl_exec($ch);
//          curl_close($ch);
//          return $html;
//      }
 
//      private function getImages($html)
//      {
//          $images = [];
//          $doc = new \DOMDocument();
         
//          @$doc->loadHTML($html);
         
//          $imgTags = $doc->getElementsByTagName('img');
//          foreach ($imgTags as $imgTag) {
//              $images[] = $imgTag->getAttribute('src');
//          }
//          return $images;
//      }
//  private function convertImage($imageUrl)
// {
//     $path_parts = pathinfo($imageUrl);
//     $extension = strtolower($path_parts['extension']);

//     if ($extension === 'jpg' || $extension === 'jpeg') {
//         $image = imagecreatefromjpeg($imageUrl);
//     } elseif ($extension === 'png') {
//         $image = imagecreatefrompng($imageUrl);
//     } else {
//         return;
//     }

//     $ch = curl_init($imageUrl);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $imageData = curl_exec($ch);
//     curl_close($ch);

//     $webpPath = $path_parts['dirname'] . '/' . $path_parts['filename'] . '.webp';

//     $webpImage = imagecreatefromstring($imageData);
//     imagewebp($webpImage, $webpPath, 80);

//     imagedestroy($image);
//     imagedestroy($webpImage);
// }

 
//      private function createZip($images)
//      {
//          $zip = new \ZipArchive();
//          $zipName = 'converted_images.zip';
//          $zipPath = public_path($zipName);
//          $zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
 
//          foreach ($images as $image) {
//              $path_parts = pathinfo($image);
//              $webpPath = $path_parts['dirname'] . '/' . $path_parts['filename'] . '.webp';
//              $zip->addFile($webpPath, $path_parts['filename'] . '.webp');
//          }
 
//          $zip->close();
 
//          return $zipPath;
//      }
//  }
 

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------


// namespace App\Http\Controllers;
// use Illuminate\Http\Request;

// use Intervention\Image\Facades\Image;

// class ImageoptController extends Controller
//  {

//         public function index()
//     {
//         return view('website_image');
//     }
//     public function convert (Request $request)
//     {
//         // Get the URL from the user input
//         $url = $request->input('url');

//         // Use cURL to fetch the HTML content of the website
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         $html = curl_exec($ch);
//         curl_close($ch);

//         // Use PHP Simple HTML DOM Parser to parse the HTML content
//         $dom = new \DomDocument();
//         @$dom->loadHTML($html);
//         $xpath = new \DOMXPath($dom);

//         // Find all the image tags in the HTML content
//         $images = $xpath->query('//img');

//         // Loop through each image and download it
//         foreach ($images as $image) {
//             $src = $image->getAttribute('src');

//             // Download the image using cURL
//             $ch = curl_init();
//             curl_setopt($ch, CURLOPT_URL, $src);
//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//             $imageData = curl_exec($ch);
//             curl_close($ch);

//             // Create an Intervention Image instance from the downloaded image data
//             $img = Image::make($imageData);

//             // Convert the image to WebP format
//             $img->encode('webp');

//             // Save the converted image to disk
//             $filename = basename($src);
//             $dirName = 'images_' . time();
//             mkdir($dirName);
//             $save_dir = $dirName . '/';
//             $img->save(public_path($save_dir . $filename));
//         }

//         // Redirect the user back to the form
//         return redirect()->back();
//     }
// }

 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;


// class ImageoptController extends Controller
//  {

//         public function index()
//     {
//         return view('website_image');
//     }
//     public function convert(Request $request)
//     {
//         // Get the URL from the user input
//         $url = $request->input('url');

//         // Use cURL to fetch the HTML content of the website
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         $html = curl_exec($ch);

//         // Check if the cURL request was successful
//         if (curl_errno($ch)) {
//             return redirect()->back()->with('error', 'Failed to fetch website content: ' . curl_error($ch));
//         }

//         // Check if the HTML content is not empty
//         if (empty($html)) {
//             return redirect()->back()->with('error', 'Website content is empty');
//         }

//         curl_close($ch);

//         // Use PHP Simple HTML DOM Parser to parse the HTML content
//         $dom = new \DomDocument();
//         @$dom->loadHTML($html);
//         $xpath = new \DOMXPath($dom);

//         // Find all the image tags in the HTML content
//         $images = $xpath->query('//img');

//         // Loop through each image and download it
//         foreach ($images as $image) {
//             $src = $image->getAttribute('src');

//             // Download the image using cURL
//             $ch = curl_init();
//             curl_setopt($ch, CURLOPT_URL, $src);
//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//             $imageData = curl_exec($ch);
//             curl_close($ch);

//             // Create an Intervention Image instance from the downloaded image data
//             $img = Image::make($imageData);

//             // Convert the image to WebP format
//             $img->encode('webp');

//             // Save the converted image to disk
//             $filename = basename($src);
//             $img->save(public_path('images/' . $filename));
//         }

//         // Redirect the user back to the form
//         return redirect()->back()->with('success', 'Images downloaded successfully');
//     }
// }


 //-------------------------------------------//-------------------------------------------//-------------------------------------------//-------------------------------------------
 



//  namespace App\Http\Controllers;
 
//  use Illuminate\Http\Request;
//  use Illuminate\Support\Facades\Storage;
//  use GuzzleHttp\Client;
//  use Symfony\Component\DomCrawler\Crawler;
 
//  class ImageoptController extends Controller
//  {
//      public function index()
//      {
//          return view('website_image');
//      }
 
//      public function convert(Request $request)
//      {
//          // Validate the form input
//          $validatedData = $request->validate([
//              'url' => 'required|url'
//          ]);
 
//          // Get the website URL from the form input
//          $websiteUrl = $validatedData['url'];
 
//          // Scrape all the images from the website
//          $client = new Client();
//          $response = $client->get($websiteUrl);
//          $html = $response->getBody()->getContents();
//          $crawler = new Crawler($html);
//          $images = $crawler->filter('img')->extract(['src']);
 
//          // Convert all the scraped images to webp format
//          $convertedImages = [];
//          foreach ($images as $image) {
//              $imageUrl = $this->getAbsoluteUrl($image, $websiteUrl);
//              $imageContent = $this->getImageContent($imageUrl);
//              if ($imageContent !== false) {
//                  $convertedImageContent = $this->convertToWebp($imageContent);
//                  $convertedImages[] = [
//                      'name' => basename($imageUrl),
//                      'content' => $convertedImageContent
//                  ];
//              }
//          }
 
//          // Save the converted images to a downloadable file
//          if (count($convertedImages) > 0) {
//              $fileName = 'webp_images.zip';
//              $zip = new \ZipArchive();
//              if ($zip->open(storage_path('app/' . $fileName), \ZipArchive::CREATE) === true) {
//                  foreach ($convertedImages as $convertedImage) {
//                      $zip->addFromString($convertedImage['name'], $convertedImage['content']);
//                  }
//                  $zip->close();
//              }
//              return response()->download(storage_path('app/' . $fileName))->deleteFileAfterSend();
//          } else {
//              return back()->with('error', 'No images found on the provided URL or failed to download images.');
//          }
//      }
 
//      private function getAbsoluteUrl($url, $baseUrl)
//      {
//          if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
//              return $url;
//          }
//          if (strpos($url, '/') === 0) {
//              return rtrim($baseUrl, '/') . $url;
//          }
//          return $baseUrl . '/' . $url;
//      }
 
//      private function getImageContent($imageUrl)
//      {
//          $client = new Client();
//          try {
//              $response = $client->get($imageUrl);
//              return $response->getBody()->getContents();
//          } catch (\Exception $e) {
//              return false;
//          }
//      }
 
//      private function convertToWebp($imageContent)
//      {
//          $imagick = new \Imagick();
//          $imagick->readImageBlob($imageContent);
//          $imagick->setImageFormat('webp');
//          return $imagick->getImageBlob();
//      }
//  }
 



// namespace App\Http\Controllers;

// class Downloader
// {
//     public static function download($url, $path)
//     {
//         $ch = curl_init($url);
//         $fp = fopen($path, 'wb');
//         curl_setopt($ch, CURLOPT_FILE, $fp);
//         curl_setopt($ch, CURLOPT_HEADER, 0);
//         curl_exec($ch);
//         curl_close($ch);
//         fclose($fp);
//     }
// }
// public function handle()
// {
//     $url = $this->argument('url');
//     $html = file_get_contents($url);

//     $dom = new \DOMDocument();
//     @$dom->loadHTML($html);

//     $images = $dom->getElementsByTagName('img');

//     foreach ($images as $image) {
//         $src = $image->getAttribute('src');

//         if (pathinfo($src, PATHINFO_EXTENSION) == 'jpg' || pathinfo($src, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($src, PATHINFO_EXTENSION) == 'png') {
//             $img = file_get_contents($src);
//             $img = imagecreatefromstring($img);
//             ob_start();
//             imagewebp($img, null, 80);
//             $webp = ob_get_contents();
//             ob_end_clean();
//             $webp_path = str_replace(pathinfo($src, PATHINFO_EXTENSION), 'webp', $src);
//             file_put_contents($webp_path, $webp);
//             Downloader::download(url($webp_path), pathinfo($webp_path, PATHINFO_BASENAME));
//         }
//     }
// }
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;


 
//  class ImageoptController extends Controller
//  {
//  function convertAndDownload(Request $request)
// {
//     $url = $request->input('url');
//     $html = file_get_contents($url);

//     $dom = new \DOMDocument();
//     @$dom->loadHTML($html);

//     $images = $dom->getElementsByTagName('img');

//     foreach ($images as $image) {
//         $src = $image->getAttribute('src');

//         if (pathinfo($src, PATHINFO_EXTENSION) == 'jpg' || pathinfo($src, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($src, PATHINFO_EXTENSION) == 'png') {
//             $img = file_get_contents($src);
//             $img = imagecreatefromstring($img);
//             ob_start();
//             imagewebp($img, null, 80);
//             $webp = ob_get_contents();
//             ob_end_clean();
//             $webp_path = str_replace(pathinfo($src, PATHINFO_EXTENSION), 'webp', $src);
//             file_put_contents($webp_path, $webp);
//             $filename = pathinfo($webp_path, PATHINFO_BASENAME);
//             $contents = file_get_contents($webp_path);
//             return response()->streamDownload(function () use ($contents) {
//                 echo $contents;
//             }, $filename);
//         }
//     }
// }
//  }


// <form method="POST" action="/convert-images">
//     @csrf
//     <input type="text" name="url" placeholder="Enter website URL">
//     <button type="submit">Convert and download images</button>
// </form>
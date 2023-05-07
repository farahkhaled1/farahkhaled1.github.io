<?php
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
        return view('website_image');
        // return view('website_image', compact('request'));
        // return view('analyzer', ['result' => $data]);
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
        // return view('website_image');
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
            CURLOPT_CUSTOMREQUEST => 'GET',
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






}
?>
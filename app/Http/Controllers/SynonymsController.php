<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PHPHtmlParser\Dom;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;


class SynonymsController extends Controller
 {
//     public function index()
//     {
//         return view('synonyms');
//     }
    
//     public function syn(Request $request){
//         $validatedData = $request->validate([
//             'syn' => 'required|url',
//         ]);
//         // $request->session()->put('syn', $validatedData['syn']);
//         return redirect()->back();

//     }
//php artisan make:controller ScrapeController


public function scrapeWebsite()
{
    // // Execute the Python script and capture the output
    // $output = shell_exec("C:/Users/Hanien/Documents/GitHub/seopro/python/scrape.py");

    // // Pass the output to the view
    // return view('output-form', ['output' => $output]);
//////////////////
    // $url = "https://choconutsworld.com/";

    //     // Make a GET request to the Python script URL
    //     // $response = Http::timeout(60)->get('http://localhost:8000/scrape', ['url' => $url]);
    //     $response = Http::get('http://localhost:8000/scrape', ['url' => $url]);

    //     // Retrieve the response content
    //     $output = $response->body();

    //     // Pass the output to the view
    //     return view('output-form', ['output' => $output]);
 // Execute the Python script and redirect the output to a file
 /////////////////////
    // exec('python /C:/Users/Hanien/Documents/GitHub/seopro/python/scrape.py');

    // // Read the output from the file
    // $output = file_get_contents('C:/Users/Hanien/Documents/output.txt');

    // // Do something with the output
    // // ...

    // return view('output-form', ['output' => $output]);
    ////////////////////////////
    // $output = shell_exec("python C:/Users/Hanien/Documents/GitHub/seopro/python/scrape.py");
    // return view('output-form', ['output' => $output]);
    /////////////
    // $output = shell_exec('python scrape.py');
    // return view('output-form', ['output' => $output]);

    ////////////////////
    try {
        // Command and arguments to execute the Python script
        $command = ['python', 'C:/Users/Hanien/Documents/GitHub/seopro/python/scrape.py'];
        // $command = 'python ' . base_path('C:/Users/Hanien/Documents/GitHub/seopro/python/scrape.py');

        // Execute the command
        $process = new Process($command);
        $process->run();

        // Check if the process was successful
        if ($process->isSuccessful()) {
            // Get the output of the Python script
            $output = $process->getOutput();

            // Display the output in the Laravel view
            return view('output-form', ['output' => $output]);
        } else {
            // Handle the case when the process fails
            throw new ProcessFailedException($process);
        }
    } catch (\Exception $e) {
        // Log or handle the exception as needed
        $errorMessage = 'An error occurred while executing the Python script.';
        return view('output-form', ['output' => $errorMessage]);
    }

}
}
?>
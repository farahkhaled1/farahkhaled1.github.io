<?php

namespace App\Http\Controllers;
use Symfony\Component\Process\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GivenNichearController extends Controller
{
    // public function index()
    // {
    //     return view('keyword_ar');
    // }
    public function store_niche_ar(Request $request)
    {
        $validatedData = $request->validate([
            'niche' => 'required|max:255',
        ]);

        $user_id = Auth::id(); // Get the current user's id

        DB::table('given_niche_ar')->insert([
            'uid' => $user_id, // Store the user id
            'niche' => $validatedData['niche'],
        ]);

        // Store the niche value in the user's session
        // $request->session()->put('niche', $validatedData['niche']);

        // // return redirect()->back()->with('success', 'Niche keyword added successfully.');
        // return redirect()->back();


        $request->session()->put('niche',$validatedData['niche']);
        if( self::runPythonScriptWithShell()){
            return redirect()->back();
        }
        return redirect()->back()->with(["error"=>"Failed to process your request. Please try again later."]);
    }
    private static function runPythonScriptWithShell()
    {
        $pythonScriptPath = 'tf_idf_ar.py';
        $absolute_path = (("../python/Arabic/".$pythonScriptPath));
        $output = shell_exec("cd ".public_path()."&& python \"".$absolute_path."\" ERROR 2>&1");
        if(trim($output) == "success")
            return true;
        return false;
    }   
        // Store the niche value in the user's session
       
    //     // return redirect()->back()->with('success', 'Niche keyword added successfully.');
    //     // return redirect()->back();
    // public function runPythonScript(Request $request){
    //     $pythonScriptPath = 'db_tf_idf.ipynb';

    // // // Create a new process to execute the Python script
    // $process = new Process(['python', $pythonScriptPath]);

    // // Start the process
    // $process->start();

    // // Wait for the process to complete
    // while ($process->isRunning()) {
    //     usleep(500000); // Wait for 0.5 seconds
    // }

    // // Get the output of the process
    // $output = $process->getOutput();

    // // Return the output to the user
    // return redirect()->back();
    // return response($output);
  
    // }
    // public function combinedFunction()
    // {
    //     store_niche(Request);
    //     runPythonScript(Request);
    // }

    // }
//     // In your Laravel controller method
//     $output = exec("python {$pythonScriptPath}");
// $data = [];
// $scriptPath = 'db_tf_idf.ipynb';
// $command = sprintf('python %s %s', $scriptPath, implode(' ', $data));
// exec($command, $output);
// return redirect()->back();
// Do something with the output, if needed

    // $output = shell_exec('db_tf_idf.ipynb');
    // return $output;
    // return redirect()->back();
    }


        // public function show(){
        // return view('tf_idf');
    // }
    // public function runPythonScript(Request $request)
    // {
    //     $pythonScriptPath = 'F:/last semester/final project/seopro/python/English/db_tf_idf.ipynb';

    // // Create a new process to execute the Python script
    // $process = new Process(['python', $pythonScriptPath]);

    // // Start the process
    // $process->start();

    // // Wait for the process to complete
    // while ($process->isRunning()) {
    //     usleep(500000); // Wait for 0.5 seconds
    // }

    // // Get the output of the process
    // $output = $process->getOutput();

    // // Return the output to the user
    // return response($output);
    // }
    // $output = 'hello';
    // $result = shell_exec('db_tf_idf.ipynb');
    // return $result;
//     $notebookPath = 'db_tf_idf.ipynb';

// // Convert notebook to HTML using nbconvert command
// $html = shell_exec("python {$notebookPath}");

// // Output the HTML in Laravel
// // return view('keyword');
// return view('keyword', ['html' => $html]);
  
 

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;

// class GivenNicheController extends Controller
// {
//     public function store_niche(Request $request)
//     {
//         $validatedData = $request->validate([
//             'niche' => 'required|max:255',
//         ]);

//         $user_id = Auth::id(); // Get the current user's id

//         DB::table('given_niche')->insert([
//             'niche' => $validatedData['niche'],
//         ]);

//          // Store the niche value in the user's session
//          $request->session()->put('niche', $validatedData['niche']);

//         // return redirect()->back()->with('success', 'Niche keyword added successfully.');
//         return redirect()->back();

//     }
// }

?>








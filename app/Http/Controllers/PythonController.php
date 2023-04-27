<?php

namespace App\Http\Controllers;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


use Illuminate\Http\Request;

class PythonController extends Controller
{
    // public function index()
    // {
    //     $process = new Process([' usr/bin/python3', public_path('test.py')]);
    //     $process->run();
        
    //     if (!$process->isSuccessful()) {
    //         throw new ProcessFailedException($process);
    //     }
        
    //     return $process->getOutput();
    // }



    // ---------------------- 
    // public function runScript()
    // {
    //     $output = shell_exec('python3 script.py');
    //     return view('python_output', ['output' => $output]);
    // }
    

}

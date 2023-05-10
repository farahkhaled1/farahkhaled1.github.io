<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


use Symfony\Component\Process\Process;

Route::get('/scrape', function (Request $request) {
    $url = $request->input('url');
    $output = '';

    // Run the Python script using the URL parameter
    $process = new Process(["python", "C:/Users/Hanien/Documents/GitHub/seopro/python/scrape.py", $url]);
    $process->run();

    // Get the output of the Python script
    if ($process->isSuccessful()) {
        $output = $process->getOutput();
    }

    return $output;
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

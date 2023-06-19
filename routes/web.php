<?php

use App\Http\Controllers\AiController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteImageController;
use App\Http\Controllers\tfidfController;
use App\Http\Controllers\ImageoptController;
use App\Http\Controllers\ControllerHtml;
use App\Http\Controllers\PythonController;
use App\Http\Controllers\LoadTimeController;
use App\Http\Controllers\GivenNicheController;
use App\Http\Controllers\GivenNichearController;
use App\Http\Controllers\GivenUrlController;
use App\Http\Controllers\GivenUrlarController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\tfidf;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MagicEditorController;



use App\Http\Controllers\AnalyticsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('/images', [ImageoptController::class, 'index']);
Route::post('/convert', [ImageoptController::class, 'convert'])->name('convert');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	

	
	Route::get('/editor', [BlogController::class, 'index']);
    Route::post('/editor', [BlogController::class, 'editor'])->name('editor');
	

	Route::get('/magiceditor', [MagicEditorController::class, 'index']);
	Route::get('/magiceditor', [MagicEditorController::class, 'sendSentence'])->name('sendSentence');
    Route::post('/magiceditor', [MagicEditorController::class, 'magiceditor'])->name('magiceditor');


	// Route::get('analyzer', function () {
	// 	return view('analyzer');
	// })->name('analyzer');



	// Route::get('analyzerr', function () {
	// 	return view('analyzerr');
	// })->name('analyzerr');


	Route::get('/images', [ImageoptController::class, 'index']);
	Route::post('/convert', [ImageoptController::class, 'convert'])->name('convert');
	
	Route::get('keyword', function () {
		return view('keyword');
		
	})->name('keyword');

	Route::get('keyword_ar', function () {
		return view('keyword_ar');
		
	})->name('keyword_ar');

	// Route::get('analyticshistorydetails', function () {
	// 	return view('analyticshistorydetails');
	// })->name('analyticshistorydetails');

	Route::get('analyticshistorydetails/{domain_url}', function ($domain_url) {
		return view('analyticshistorydetails', ['domain_url' => $domain_url]);
	})->name('analyticshistorydetails');
	
	

	Route::get('analyticshistory', function () {
		return view('analyticshistory');
	})->name('analyticshistory');


	// Route::get('analyticshistorydetails', [AnalyticsController::class, 'showDetails'])->name('analyticshistorydetails');


	Route::get('analyticshistory', function () {
		return view('analyticshistory');
	})->name('analyticshistory');


	Route::get('analyticshistorydetails', [AnalyticsController::class, 'showDetails'])->name('analyticshistorydetails');

	// Route::get('analyticshistorydetails', function () {
	// 	return view('analyticshistorydetails');
	// })->name('analyticshistorydetails');

	
	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');


	Route::get('/scrapeurl', [GivenUrlController::class, 'index']);
    Route::post('/scrapeurl', [GivenUrlController::class, 'store_url'])->name('store_url');

	Route::get('/scrapeurlar', [GivenUrlarController::class, 'index']);
    Route::post('/scrapeurlar', [GivenUrlarController::class, 'store_url'])->name('store_url');
	
	Route::get('/ai', [AiController::class, 'show']);
    Route::post('/ai', [AiController::class, 'display'])->name('display');

	Route::post('/api/data', 'GivenNicheController@store');



	Route::post('/store_niche', [GivenNicheController::class, 'store_niche'])->name('store_niche');
	
	// Route::post('/runpythonscript', [GivenNicheController::class, 'runpythonscript'])->name('runpythonscript');
	// Route::post('/combined-function', [GivenNicheController::class, 'combinedFunction'])->name('combined.function');
	// Route::post('/store', [GivenNicheController::class, 'store'])->name('store');

	Route::post('/api/data', 'GivenNicheController@store');
	Route::get('/loadtime', [LoadTimeController::class, 'front']);
    Route::post('/loadtime', [LoadTimeController::class, 'back'])->name('back');

	

	Route::get('/analyzer', [DomainController::class, 'index']);
    Route::post('/analyzer', [DomainController::class, 'result'])->name('result');

	Route::get('/scrapeurl', [GivenUrlController::class, 'index']);
    Route::post('/scrapeurl', [GivenUrlController::class, 'store_url'])->name('store_url');

	
	// Route::get('/keyword_ar', [GivenNichearController::class, 'index']);
    Route::post('/keyword_ar', [GivenNichearController::class, 'store_niche_ar'])->name('store_niche_ar');
	
	// Route::post('/run-python', function () {
	// 	$output = exec('python3 script.py');
	// 	return $output;
	// });
	// Route::get('/run-python-script', [PythonController::class, 'runScript']);

	// Route::get('/run-python', function () {
	// 	$output = exec('python3 script.py');
	// 	return $output;
	// });
	

// Route::get('/images', [ImageoptController::class, 'index']);
// Route::post('/convert', [ImageoptController::class, 'convert'])->name('convert');

// Route::get('/images', [ImageoptController::class, 'imageopt']);




// 	Route::get('/imageopt', [ImageoptController::class, 'index']);
//     Route::post('/imageopt', [ImageoptController::class, 'imageopt'])->name('imageopt');



	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');


    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

// Route::post('/run-python', function () {
//     $output = exec('F:/last semester/final project/seopro/python/English/db_tf_idf.ipynb');
//     return $output;
// });

// Route::get('/images', [ImageoptController::class, 'index']);

Route::post('/run-python-btn', 'GivenNicheController@run');

// Route::get('/images', function () {
//     return view('website_image');
// })->name('website_image');

// Route::post('/convert', [ImageoptController::class, 'convert'])->name('convert');


Route::post('/tf_idf', function () {
    return view('tf_idf');
})->name('tf_idf');

// Route::post('/db_tf_idf', function () {
//     $output = [];
//     $result = exec(' db_tf_idf.ipynb', $output);
//     return $output;
	
//     // $pythonScriptPath = 'F:/last semester/final project/seopro/python/English/db_tf_idf.ipynb';

//     // // Create a new process to execute the Python script
//     // $process = new Process(['python', $pythonScriptPath]);

//     // // Start the process
//     // $process->start();

//     // // Wait for the process to complete
//     // while ($process->isRunning()) {
//     //     usleep(500000); // Wait for 0.5 seconds
//     // }

//     // // Get the output of the process
//     // $output = $process->getOutput();

//     // // Return the output to the user
//     // return response($output);


// // 	$command = 'python db_tf_idf.ipynb';
// // exec($command, $output, $return_val);
// // while($return_val === null) {
// //     sleep(1);
// // }

// // // If the Python script completed successfully, display the results
// // if($return_val === 0) {
// //     // display results

// //     // // Return the output to the user
// //     return response($output);
// // } else {
// //     // display error message
// // }
    
// });


// Route::get('/run-python', function () {
//     exec('db_tf_idf.ipynb');
//     return redirect()->back();
// });

// Route::get('/run-python-script', function () {
//     // Use the exec() function to run your Python script
// 	shell_exec("F:/last semester/final project/seopro/python/English/db_tf_idf.ipynb", $output);

//     // Print the output of the Python script
//     var_dump($output);
// });

Route::get('/display-html', [ControllerHtml::class, 'displayHtml']);



Route::get('/another', function () {
    return view('another');
})->name('another');
// Route::post('/register', [RegisterController::class, 'store']);

Route::get('/tfidf', [tfidf::class, 'index']);


// Route::get('/editor', [EditorController::class, 'showEditor']);
// Route::post('/editor', [EditorController::class, 'display'])->name('display');


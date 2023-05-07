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
use App\Http\Controllers\ImageoptController;
use App\Http\Controllers\ControllerHtml;
use App\Http\Controllers\PythonController;
use App\Http\Controllers\LoadTimeController;
use App\Http\Controllers\GivenNicheController;
use App\Http\Controllers\DomainController;



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


	
	
	Route::get('/ai', [AiController::class, 'show']);
    Route::post('/ai', [AiController::class, 'display'])->name('display');



	Route::post('/store_niche', [GivenNicheController::class, 'store_niche'])->name('store_niche');

	
	Route::get('/loadtime', [LoadTimeController::class, 'front']);
    Route::post('/loadtime', [LoadTimeController::class, 'back'])->name('back');

	

	Route::get('/analyzer', [DomainController::class, 'index']);
    Route::post('/analyzer', [DomainController::class, 'result'])->name('result');


	// Route::get('/run-python-script', [PythonController::class, 'runScript']);

	Route::get('/run-python', function () {
		$output = exec('python3 script.py');
		return $output;
	});
	


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




// Route::get('/test1', function () {
//     return view('imageopt/imageoptcopy');
// })->name('imageopt');



// Route::get('/test2', function () {
//     return view('imageopt/imageopt2');
// })->name('imageopt');






// routes/web.php


// Route::get('/images', [ImageoptController::class, 'index']);


// Route::get('/images', function () {
//     return view('website_image');
// })->name('website_image');

// Route::post('/convert', [ImageoptController::class, 'convert'])->name('convert');


Route::get('/tf_idf', function () {
    return view('tf_idf');
})->name('tf_idf');


Route::get('/run-script', function () {
    $output = [];
    $result = exec('python tf_idf.py', $output);
    return $output;
});




Route::get('/display-html', [ControllerHtml::class, 'displayHtml']);



Route::get('/another', function () {
    return view('another');
})->name('another');

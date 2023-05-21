<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DemoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [DemoController::class, 'index'])->name('user.index');
Route::post('/user', [DemoController::class, 'store'])->name('user.store');
Route::get('/json', [DemoController::class, 'json']);
Route::post('/upload', [DemoController::class, 'upload']);

Route::post('/submit/{email}', function(Request $request){
    $email = $request->email;
    return array(
        'success' => true,
        'message' => 'Form submitted successfully'
    );
});




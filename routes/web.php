<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', function () {
//    return view('home');
//});


Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/article1', function () {
    return view('admin.article1');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




//make featureupdate controller

Route::get('/featuredblog', function () {
    return view('admin.featuredblog');
});
Route::post('/update', 'App\Http\Controllers\Featureupdate@update');
Route::get('/', 'App\Http\Controllers\Featureupdate@index');

//lates

Route::get('/lates', function () {
    return view('admin.latestnews');
});
Route::post('/latestnewsupdate', 'App\Http\Controllers\news@update');
Route::get('/', 'App\Http\Controllers\news@index');

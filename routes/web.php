<?php


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

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

Route::get('/', [ItemsController::class,'index']);

Route::post('/',[ItemsController::class,'store']);

Route::post('/download/{id}',[ItemsController::class,'download'])->name('download');

Route::post('/delete/{id}',[ItemsController::class,'delete'])->name('delete');

Route::get('/about',[Controller::class,'about'])->name('about');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ECCDF1kController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/records', RecordController::class);
Route::resource('/eccdf1k', ECCDF1kController::class);
Route::resource('/templates', TemplateController::class);
Route::resource('/issues', IssueController::class);
Route::resource('/profile', ProfileController::class);
Route::resource('/pages', PageController::class);

//issue 
Route::get('/results', function(){
    return \File::get(public_path() . '/last_docx.html');
});
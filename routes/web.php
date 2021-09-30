<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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
Route::get('/',function(){
    return view('mainPage');
});

Route::get('/index', function () {
    return view('index');
})->name('books');



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('mainPage');

Route::get('/book/addbook',[BookController::class,'create'])->name('book.addbook');
Route::post('/book/addingbook',[BookController::class,'store'])->name('book.addingbook');
Route::get('editbook/{id}',[BookController::class,'edit'])->name('editbook');
Route::post('editbook',[BookController::class,'update'])->name('editedbook');
Route::get('deletebook/{id}',[BookController::class,'destroy'])->name('deletebook');



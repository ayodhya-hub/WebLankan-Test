<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemeberController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('post-registration');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('post-login'); 

Route::get('get-members', [MemeberController::class, 'getMembers'])->name('get-members');
Route::get("edit/{id}",[MemeberController::class,'edit'])->name('edit');
Route::post("post-edit",[MemeberController::class,'postEdit'])->name('post-edit');
Route::get("insert",[MemeberController::class,'insert'])->name('insert');
Route::post('post-insert', [MemeberController::class, 'postInsert'])->name('post-insert'); 


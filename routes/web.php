<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('admin/category', [CategoryController::class, 'create'])->name('category.add');
    Route::post('admin/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('admin/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('admin/getDetails/{id}', [CategoryController::class, 'getcategoryDetails'])->name('category.details');
    Route::post('admin/getDetails/{id}', [CategoryController::class, 'edit'])->name('category.edit');
});

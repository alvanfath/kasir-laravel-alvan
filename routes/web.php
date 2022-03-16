<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\KasirController;


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
    return view('login.login');
});
Route::group(['middleware' => ['auth','cek_role:admin,manager,kasir']], function(){
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
});

//admin
Route::group(['middleware' => ['auth','cek_role:admin']], function(){
    Route::get('indexadmin',[AdminController::class, 'indexadmin'])->name('indexadmin');
    Route::get('createuser',[AdminController::class, 'createuser'])->name('createuser');
    Route::post('postuser',[AdminController::class, 'postuser'])->name('postuser');
    Route::get('editu',[AdminController::class, 'show'])->name('editu');
    Route::put('updateuser/{id}',[AdminController::class, 'updateuser'])->name('updateuser');
    Route::get('destroyuser/{id}',[AdminController::class, 'destroyuser'])->name('destroyuser');
});


//manager
Route::group(['middleware' => ['auth','cek_role:manager']], function(){
    Route::get('indexm',[ManagerController::class, 'indexm'])->name('indexm');
    Route::post('store',[ManagerController::class, 'store'])->name('store');
    Route::get('editm',[ManagerController::class, 'edit'])->name('editm');
    Route::put('updatem',[ManagerController::class, 'updatem'])->name('updatem');
    Route::get('destroym/{id}',[ManagerController::class, 'destroym'])->name('destroym');
    Route::get('laporan',[ManagerController::class, 'laporan'])->name('laporan');
    Route::get('search',[ManagerController::class, 'search'])->name('search');
    Route::get('searchmenu',[ManagerController::class, 'searchmenu'])->name('searchmenu');
    Route::get('PrintAll',[ManagerController::class, 'PrintAll'])->name('PrintAll');
    Route::get('PrintCustom',[ManagerController::class, 'PrintCustom'])->name('PrintCustom');
    Route::resource('manager', ManagerController::class);
});

//kasir
Route::group(['middleware' => ['auth','cek_role:kasir']], function(){ 
    Route::get('indexk',[KasirController::class, 'indexk'])->name('indexk');
    Route::post('storek',[KasirController::class, 'storek'])->name('storek');
    Route::get('destroyt/{id}',[KasirController::class, 'destroyt'])->name('destroyt');
    Route::get('menu',[KasirController::class, 'menu'])->name('menu');
});

//login
Route::get('login',[LoginController::class, 'index'])->middleware('guest')->name('login');
Route::Post('authenticate',[LoginController::class, 'authenticate'])->name('authenticate');

//logout
Route::get('logout',[LoginController::class, 'logout'])->name('logout');










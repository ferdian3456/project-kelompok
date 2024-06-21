<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/homepage', function () {
    return view('homepage');
});





Route::get('/registerOwner', [OwnerController::class, 'showRegistration']);
Route::post('/registerOwner', [OwnerController::class, 'registration']);

Route::get('/LoginOwner', [OwnerController::class, 'showLogin']);
Route::post('/LoginOwner', [OwnerController::class, 'login']);

Route::get('/registerInvestor', [InvestorController::class, 'showRegistration']);
Route::post('/registerInvestor', [InvestorController::class, 'registration']);

Route::get('/registerAdmin', [InvestorController::class, 'showLogin']);
Route::post('/registerAdmin', [InvestorController::class, 'login']);

Route::get('/LoginInvestor', [InvestorController::class, 'showLogin']);
Route::post('/LoginInvestor', [InvestorController::class, 'login']);

Route::get('/registerAdmin', [AdminController::class, 'showLogin']);
Route::post('/registerAdmin', [AdminController::class, 'login']);

Route::get('/LoginAdmin', [AdminController::class, 'showLogin']);
Route::post('/LoginAdmin', [AdminController::class, 'login']);

Route::get('/ChooseLogin', [LoginController::class, 'showLoginChoose']);
Route::get('/ChooseRegister', [RegisterController::class, 'showRegisterChoose']);

Route::get('/viewData/{id}', [OwnerController::class, 'viewById']);

Route::get('/updateData/{id}', [OwnerController::class, 'showUpdate']);
Route::post('/updateData/{id}', [OwnerController::class, 'update']);
Route::get('/deleteData/{id}',[OwnerController::class,'delete']);

Route::get('/viewData/{id}', [InvestorController::class, 'viewById']);

Route::get('/updateData/{id}', [InvestorController::class, 'showUpdate']);
Route::post('/updateData/{id}', [InvestorController::class, 'update']);
Route::get('/deleteData/{id}',[InvestorController::class,'delete']);

Route::get('/dashboard',[AdminController::class,'index']);
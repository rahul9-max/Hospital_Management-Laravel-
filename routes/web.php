<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'show']);
// ->middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('add_doctor',[AdminController::class,'addView']);
Route::post('add_doctor',[AdminController::class,'store'])->name('add_doctor');
Route::post('appointment',[HomeController::class,'appointment']);
Route::get('myAppointment',[HomeController::class,'myAppointment']);
Route::get('cancel/{id}',[HomeController::class,'cancel']);
Route::get('showAppoint',[AdminController::class,'showAppoint']);
Route::get('cancelAppoint/{id}',[AdminController::class,'cancelAppoint']);
Route::get('approveAppoint/{id}',[AdminController::class,'approveAppoint']);
Route::get('showDoctor',[AdminController::class,'showDoctor']);
Route::get('deleteDoc/{id}',[AdminController::class,'deleteDoc']);
Route::get('updateDoc/{id}',[AdminController::class,'updateDoc']);
Route::post('editDoc/{id}',[AdminController::class,'editDoc'])->name('edit_doc');
Route::get('viewEmail/{id}',[AdminController::class,'viewEmail']);
Route::post('sendEmail/{id}',[AdminController::class,'sendEmail']);

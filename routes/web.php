<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestroController;
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
Route::group(['middleware'=>'web'], function(){
    Route::get('/', [RestroController::class, 'index']);
    Route::get('lists',[RestroController::class, 'lists']);
    Route::post('/add', [RestroController::class, 'add']);
    Route::view('add', 'add');
    Route::view('login', 'login');
    Route::post('login', [RestroController::class, 'login']);
    Route::view('register', 'register');
    Route::post('register', [RestroController::class, 'userRegister']);
    Route::get('logout',[RestroController::class, 'logout']);
    Route::get('book/{id}', [RestroController::class, 'getResData']);
    Route::post('book', [RestroController::class, 'booked']);
    Route::get('booking_list', [RestroController::class, 'bookingList']);
    Route::get('delete/{id}', [RestroController::class, 'removeBooking']);
    Route::get('admin', [RestroController::class, 'indexAdmin']);
    Route::get('booked_users', [RestroController::class, 'bookedUsers']);
    Route::get('res_list',[RestroController::class, 'resList']);
    Route::get('user_list', [RestroController::class, 'userList']);
    Route::get('delete_user/{id}', [RestroController::class, 'deleteUser']);
    Route::get('delete_res/{id}', [RestroController::class, 'deleteRes']);
    Route::get('delete_booking/{id}', [RestroController::class, 'deleteBooking']);
    Route::get('edit_user/{id}', [RestroController::class, 'editUser']);
    Route::post('update_user', [RestroController::class, 'updateUser']);  
    Route::get('edit_res/{id}', [RestroController::class, 'editRes']);
    Route::post('update_res', [RestroController::class, 'updateRes']);
    Route::view('errors', 'errors');
    Route::view('forget_password', 'forget_password');
    Route::post('update_password', [RestroController::class, 'updatePassword']);
});

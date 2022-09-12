<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ADMIN
Route::get('/admin', [App\Http\Controllers\UserController::class, 'adminPanel']);
Route::get('/all_documents', [App\Http\Controllers\DocumentController::class, 'all_docs']);
Route::get('/all_soldiers', [App\Http\Controllers\UserController::class, 'all_users']);
Route::get('/all_tanks', [App\Http\Controllers\TankController::class, 'all_tanks']);
Route::get('/about_soldier/{pass_number}', [App\Http\Controllers\UserController::class, 'about_soldier']);
Route::post('/departure_order_store', [App\Http\Controllers\OrderController::class, 'adminStore']);
Route::get('/admin_addDepartureOrder', [App\Http\Controllers\OrderController::class, 'create_as_admin']);

// TANK
Route::get('/user_tanks/{pass_number}', [App\Http\Controllers\TankController::class, 'index']);
Route::get('/user_tanks/', [App\Http\Controllers\TankController::class, 'undefined_user']);
Route::get('/add_tank', [App\Http\Controllers\TankController::class, 'create']);
Route::get('/show_tank/{tank_number}', [App\Http\Controllers\TankController::class, 'show']);
Route::post('/tankStore/', [App\Http\Controllers\TankController::class, 'store']);
Route::post('/selected_tank_orders/{tank_number}', [App\Http\Controllers\TankController::class, 'show_orders']);

// USER
Route::get('/user_main_page/{pass_number}', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/user_main_page/', [App\Http\Controllers\UserController::class, 'undefined_user']);
Route::get('/add_user', [App\Http\Controllers\UserController::class, 'create']);
Route::get('/editSoldier/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/update_user/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::post('/define_user/{id}', [App\Http\Controllers\UserController::class, 'define']);
Route::post('/soldierStore', [App\Http\Controllers\UserController::class, 'store']);
Route::get('/delete_user/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
Route::get('/waitingForApproval', function() {return view ('Models/soldier.waiting');});
Route::get('/wfa', [App\Http\Controllers\UserController::class, 'wfa']);

// DOCS
Route::get('user_documents/{pass_number}', [App\Http\Controllers\DocumentController::class, 'show']);
Route::get('user_documents/', [App\Http\Controllers\DocumentController::class, 'undefined_user']);
Route::get('/doclst', [App\Http\Controllers\DocumentController::class, 'index']);
Route::get('/adddoc/{pass_number}', [App\Http\Controllers\DocumentController::class, 'create']);
Route::post('/store_document/{pass_number}', [App\Http\Controllers\DocumentController::class, 'store_as_user']);
Route::post('/store_document', [App\Http\Controllers\DocumentController::class, 'store_as_admin']);
Route::get('/edit_document/{id}', [App\Http\Controllers\DocumentController::class, 'edit']);
Route::post('/updatedoc/{id}', [App\Http\Controllers\DocumentController::class, 'update']);
Route::get('/deletedoc/{id}', [App\Http\Controllers\DocumentController::class, 'destroy']);

// DEP_ORERS
Route::get('/user_departure_orders/{pass_number}', [App\Http\Controllers\OrderController::class, 'index']);
Route::get('/user_departure_orders/', [App\Http\Controllers\OrderController::class, 'undefined_user']);
Route::get('/all_departure_orders/', [App\Http\Controllers\OrderController::class, 'show_all']);
Route::get('/selected_tank_orders/{tank_number}', [App\Http\Controllers\OrderController::class, 'show_selected']);
Route::get('/addDepartureOrder/{pass_number}', [App\Http\Controllers\OrderController::class, 'create']);
Route::post('/departure_order_store/{pass_number}', [App\Http\Controllers\OrderController::class, 'store']);
Route::get('/edit_departure_order/{id}', [App\Http\Controllers\OrderController::class, 'edit']);
Route::post('/finish_order/{id}', [App\Http\Controllers\OrderController::class, 'finish']);
Route::get('/departure_order_details/{id}', [App\Http\Controllers\OrderController::class, 'show']);

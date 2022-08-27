<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ADMIN
Route::get('/admin', [App\Http\Controllers\UserController::class, 'adminPanel']);
Route::get('/all_documents', [App\Http\Controllers\UserController::class, 'allDocs']);
Route::get('/all_soldiers', [App\Http\Controllers\UserController::class, 'all_users']);
Route::get('/all_tanks', [App\Http\Controllers\TankController::class, 'show']);
Route::get('/all_departure_orders', [App\Http\Controllers\UserController::class, 'allDepartureOrders']);

// TANK
Route::get('/tankslst/{pass_number}', [App\Http\Controllers\TankController::class, 'index']);
Route::get('/addTank', [App\Http\Controllers\TankController::class, 'create']);
Route::get('/editUser/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/updateuser/{id}', [App\Http\Controllers\userController::class, 'update']);
Route::post('/tankStore/{pass_number}', [App\Http\Controllers\TankController::class, 'store']);
Route::delete('/deleteuser/{id}', [App\Http\Controllers\userController::class, 'destroy']);

// USER
Route::get('/personalFile/{pass_number}', [App\Http\Controllers\UserController::class, 'index']);
// Route::get('/personalFile/{pass_number}', [App\Http\Controllers\TankController::class, 'show']);
Route::get('/addUser', [App\Http\Controllers\UserController::class, 'create']);
Route::get('/editUser/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/updateUser/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::post('/userStore', [App\Http\Controllers\UserController::class, 'store']);
Route::delete('/deleteUser/{id}', [App\Http\Controllers\UserController::class, 'destroy']);

// DOCS
Route::get('userDocs/{pass_number}', [App\Http\Controllers\DocumentController::class, 'show']);
Route::get('/doclst', [App\Http\Controllers\DocumentController::class, 'index']);
Route::get('/adddoc/{pass_number}', [App\Http\Controllers\DocumentController::class, 'create']);
Route::post('/docstore/{pass_number}', [App\Http\Controllers\DocumentController::class, 'store']);
Route::get('/editdoc/{id}', [App\Http\Controllers\DocumentController::class, 'edit']);
Route::post('/updatedoc/{id}', [App\Http\Controllers\DocumentController::class, 'update']);
Route::get('/deletedoc/{id}', [App\Http\Controllers\DocumentController::class, 'destroy']);

// DEP_ORERS
Route::get('/allDepartureOrders/{pass_number}', [App\Http\Controllers\OrderController::class, 'index']);
Route::get('/selectedTankOrders/{tank_number}', [App\Http\Controllers\OrderController::class, 'showSelected']);
Route::get('/addDepartureOrder/{pass_number}', [App\Http\Controllers\OrderController::class, 'create']);
Route::post('/orderStore/{pass_number}', [App\Http\Controllers\OrderController::class, 'neworder']);
Route::get('/editOrder/{id}', [App\Http\Controllers\OrderController::class, 'edit']);
Route::post('/finishOrder/{id}', [App\Http\Controllers\OrderController::class, 'finish']);
Route::get('/orderDetails/{id}', [App\Http\Controllers\OrderController::class, 'show']);
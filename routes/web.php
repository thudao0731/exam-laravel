<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Users
Route::get('/users', [UserController::class, 'loadAllUsers']);
Route::get('user/add', [UserController::class, 'loadAddUserFrom']);
Route::post('user/add', [UserController::class, 'AddUser'])->name('AddUser');

Route::get('user/edit/{id}', [UserController::class, 'loadEditForm']);
Route::post('user/edit', [UserController::class, 'EditUser'])->name('EditUser');

Route::delete('user/delete/{id}', [UserController::class, 'deleteUser']);

// Product
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/add', [ProductController::class, 'create']);
Route::post('product/add', [ProductController::class, 'store'])->name('addproduct');


Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');


Route::delete('product/delete/{id}', [ProductController::class, 'destroy']);

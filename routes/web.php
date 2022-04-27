<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\DishCommentsController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;

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

Route::get('dishes', [DishController::class, 'index']); 
Route::get('dishes/{dish:slug}', [DishController::class, 'show']);
Route::get('dishes/create/newdish', [DishController::class, 'create']);
Route::post('dishes', [DishController::class, 'store']);

Route::post('dishes/{dish:slug}/comments', [CommentController::class, 'store']);

Route::get('register', [UserController::class, 'create'])->middleware('guest'); // ->repeat password attribute
Route::post('register', [UserController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');;
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');;
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');;

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{category:slug}', [CategoryController::class, 'show']);

Route::get('ingredients', [IngredientController::class, 'index']);
Route::get('ingredients/{ingredient:slug}', [IngredientController::class, 'show']);

Route::get('tags', [TagController::class, 'index']);
Route::get('tags/{tag:slug}', [TagController::class, 'show']);




<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function(){
    Route::get('/login',[UserController::class,'login'])->name('user_login');
    Route::post('/login',[UserController::class,'loginstore'])->name('user_loginstore');
    Route::get('/register',[UserController::class,'create'])->name('user_create');
    Route::post('/register',[UserController::class,'store'])->name('user_store');
    Route::post('/logout',[UserController::class,'logout'])->name('user_logout');
});

Route::prefix('acceuil')->group(function(){
    Route::get('/',[AcceuilController::class,'acceuil'])->name('acceuil');
});

Route::prefix('dashboard')->group(function(){
    Route::get('/',[AcceuilController::class,'dashboard'])->name('dashboard');
    Route::get('/categorie_create',[CategorieController::class,'create'])->name('categorie_create');
    Route::post('/categorie_create',[CategorieController::class,'store'])->name('categorie_store');
    Route::get('/categorie_index',[CategorieController::class,'index'])->name('categorie_index');
    Route::get('/categorie_edit/{id}',[CategorieController::class,'edit'])->name('categorie_edit');
    Route::put('/categorie_edit/{id}',[CategorieController::class,'update'])->name('categorie_update');
    Route::delete('/categorie_delete/{id}',[CategorieController::class,'destroy'])->name('categorie_delete');
    ///// produit //////
    Route::get('/produit_create',[ProduitController::class,'create'])->name('produit_create');
    Route::post('/produit_create',[ProduitController::class,'store'])->name('produit_store');
});







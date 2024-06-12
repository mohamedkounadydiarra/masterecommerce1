<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[WelcomeController::class,'welcome'])->name('welcome');

Route::prefix('user')->group(function(){
    Route::get('/login',[UserController::class,'login'])->name('user_login');
    Route::post('/login',[UserController::class,'loginstore'])->name('user_loginstore');
    Route::get('/register',[UserController::class,'create'])->name('user_create');
    Route::post('/register',[UserController::class,'store'])->name('user_store');
    Route::post('/logout',[UserController::class,'logout'])->name('user_logout');
    // interface utilisateur
    Route::get('/produit_show/{id}',[ProduitController::class,'show'])->name('produit_show');
    Route::post('/add_produit_cart',[ProduitController::class,'cart'])->name('add_produit_cart');
    Route::get('/produit_show_produit_cart',[ProduitController::class,'showcart'])->name('produit_show_produit_cart');
    Route::get('/delete_cart/{id}',[ProduitController::class,'removeFromCart'])->name('delete_cart');
    //commande
    Route::post('/commande_store',[CommandeController::class,'store'])->name('commande_store');
    Route::get('/user_commande_show', [CommandeController::class, 'usercommande'])->name('user_commande_show');
    ///// comment //////
     Route::post('/commentaire_store',[CommentaireController::class,'store'])->name('commentaire_store');
   
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
    ///// product //////
    Route::get('/produit_create',[ProduitController::class,'create'])->name('produit_create');
    Route::post('/produit_create',[ProduitController::class,'store'])->name('produit_store');
    Route::get('/produit_index',[ProduitController::class,'index'])->name('produit_index');
    Route::get('/produit_edit/{id}',[ProduitController::class,'edit'])->name('produit_edit');
    Route::put('/produit_edit/{id}',[ProduitController::class,'update'])->name('produit_update');
    Route::delete('/produit_delete/{id}',[ProduitController::class,'destroy'])->name('produit_delete');

    Route::get('/commentaire_index',[CommentaireController::class,'index'])->name('commentaire_index');
    Route::delete('/commentaire_delete/{id}',[CommentaireController::class,'destroy'])->name('commentaire_delete');
    //// la gestion des commande admin
    Route::get('/commande_index',[CommandeController::class,'index'])->name('commande_index');
    Route::put('/commande/{id}/update', [CommandeController::class, 'update'])->name('commande_update');
});









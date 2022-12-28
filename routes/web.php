<?php

use App\Http\Controllers\BlogpostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CompaniesController;

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



// Telas para os clientes
Route::get('/', [PagesController::class, 'index'])->name('pages.index');

Route::get('/contato', [PagesController::class, 'contato'])
        ->name('pages.contato');

Route::get('/historia', [PagesController::class, 'historia'])
        ->name('pages.historia');

Route::get('/valores', [PagesController::class, 'valores'])
        ->name('pages.valores');

Route::get('/catalogo', [PagesController::class, 'catalogoIndex'])
        ->name('pages.catalogo');

Route::get('/catalogo/categoria/{id}', [PagesController::class, 'catalogoFilterCategoria'])
        ->name('pages.categoria');

Route::get('/catalogo/produto/{id}', [PagesController::class, 'catalogoFilterProduto'])
        ->name('pages.produto');

Route::get('/search', [PagesController::class, 'search'])
        ->name('pages.search');

// Blog para clientes

Route::get('/blog', [PagesController::class, 'blog'])->name('blog.clientes');

Route::get('/blog/post/{id}', [PagesController::class, 'blogPost'])->name('blog.post');




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Telas para administradores
Route::middleware(['auth'])->group(function () {

//  Categorias

Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');

Route::get('/categorias/cadastro', [CategoriasController::class, 'create'])->name('categorias.create');

Route::post('/categorias/cadastro', [CategoriasController::class, 'store']);

Route::delete('/categorias/remover/{id}', [CategoriasController::class, 'destroy']);

Route::post('/categorias/editar/{id}', [CategoriasController::class, 'update']);

// Produtos

Route::get('/produtos', [ProdutosController::class, 'index'])->name('produtos.index');

Route::get('/produtos/cadastro', [ProdutosController::class, 'create'])->name('produtos.create');

Route::post('/produtos/cadastro', [ProdutosController::class, 'store']);

Route::post('/produtos/editar/{id}', [ProdutosController::class, 'update']);

Route::delete('/produtos/remover/{id}', [ProdutosController::class, 'destroy']);

Route::post('/produtos/status/{id}', [ProdutosController::class, 'status']);



// Carrossel

Route::get('/carrossel', [PagesController::class, 'carrossel'])->name('carrossel.index');

Route::get('/carrossel/cadastro', [PagesController::class, 'createCarousel'])->name('carrossel.create');

Route::post('/carrossel/cadastro', [PagesController::class, 'storeCarousel']);

Route::delete('/carrossel/remover/{id}', [PagesController::class, 'destroyCarousel']);

Route::post('/carrossel/editar/{id}', [PagesController::class, 'updateCarousel']);

Route::post('/carrossel/status/{id}', [PagesController::class, 'statusCarousel']);


// Blog

Route::get('/blogposts', [BlogpostsController::class, 'index'])->name('blog.index');

Route::get('/blogposts/novopost', [BlogpostsController::class, 'createPost'])->name('blog.create');

Route::post('/blogposts/novopost', [BlogpostsController::class, 'store']);

Route::delete('/blogposts/remover/{id}', [BlogpostsController::class, 'destroy']);

Route::post('/blogposts/editar/{id}', [BlogpostsController::class, 'update']);


// Company

Route::get('/company', [CompaniesController::class, 'index'])->name('company.index');

Route::post('/company', [CompaniesController::class, 'update']);


// Dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

Auth::routes();



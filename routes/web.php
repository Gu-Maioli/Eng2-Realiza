<?php

use App\Http\Controllers\ImovelController;
use App\Http\Controllers\ParametrizacaoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ParametrizacaoController::class, 'welcome'])->name('welcome');
/*Route::get('/', function () {
    return view('welcome');
});*/


Route::delete('/imovel/delete/{id_imovel}', [ImovelController::class, 'delete'])->name('imovel.delete');
Route::get('/imovel/show/{id}', [ImovelController::class, 'show'])->name('imovel.show');
Route::get('/imovel/index', [ImovelController::class, 'index'])->name('imovel.index');
Route::get('/imovel/cadastro', [ImovelController::class, 'cadastro'])->name('imovel.cadastro');
Route::post('/imovel/store', [ImovelController::class, 'store'])->name('imovel.store');

Route::get('/parametrizacao/index', [ParametrizacaoController::class, 'index'])->name('parametrizacao.index');
Route::post('/parametrizacao/cadastro', [ParametrizacaoController::class, 'cadastro'])->name('parametrizacao.cadastro');
Route::delete('/parametrizacao/delete/{id}', [ParametrizacaoController::class, 'delete'])->name('parametrizacao.delete');
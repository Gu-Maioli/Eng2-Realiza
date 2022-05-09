<?php

use App\Http\Controllers\ImovelController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/imovel/show/{id}', [ImovelController::class, 'show'])->name('imovel.show');
Route::get('/imovel/index', [ImovelController::class, 'index'])->name('imovel.index');
Route::get('/imovel/cadastro', [ImovelController::class, 'cadastro'])->name('imovel.cadastro');
Route::post('/imovel/store', [ImovelController::class, 'store'])->name('imovel.store');
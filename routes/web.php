<?php

use App\Livewire\IndexLivewire;
use App\Livewire\ProductLivewire;
use App\Livewire\ProductMain;
use App\Livewire\MesasMain;
use App\Livewire\OrderMain;
use App\Livewire\PostLivewire;
use Illuminate\Support\Facades\Route;

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
//Route::get('/',[PostLivewire::class,'render'])->name('index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/producto',ProductMain::class)->name('producto');
    Route::get('/mesas',MesasMain::class)->name('mesas');
    Route::get('/pedidos',OrderMain::class)->name('order');
});
// Route::get('/',[IndexLivewire::class,'render'])->name('index');
Route::get('/carta',ProductLivewire::class)->name('carta');

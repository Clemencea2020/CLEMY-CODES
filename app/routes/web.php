<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MeterController;
use App\Http\Controllers\BillController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/clients', [ClientController::class, 'index'])->middleware(['auth'])->name('clients');
Route::get('/clients/create', [ClientController::class, 'create'])->middleware(['auth'])->name('clients.create');
Route::post('/clients/create/store', [ClientController::class, 'store'])->middleware(['auth'])->name('clients.create.store');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->middleware(['auth'])->name('clients.edit');
Route::post('/clients/edit/update/{id}', [ClientController::class, 'update'])->middleware(['auth'])->name('clients.edit.update');
Route::get('/clients/delete/{id}', [ClientController::class, 'destroy'])->middleware(['auth'])->name('clients.edit.delete');


Route::get('/meters', [MeterController::class, 'index'])->middleware(['auth'])->name('meters');
Route::get('/meters/create', [MeterController::class, 'create'])->middleware(['auth'])->name('meters.create');
Route::post('/meters/create/store', [MeterController::class, 'store'])->middleware(['auth'])->name('meters.create.store');
Route::get('/meters/{id}/edit', [MeterController::class, 'edit'])->middleware(['auth'])->name('meters.edit');
Route::post('/meters/edit/update/{id}', [MeterController::class, 'update'])->middleware(['auth'])->name('meters.edit.update');
Route::get('/meters/delete/{id}', [MeterController::class, 'destroy'])->middleware(['auth'])->name('meters.edit.delete');

Route::get('/water-price', [BillController::class, 'waterprice'])->middleware(['auth'])->name('water-price');
Route::post('/water-bill/price-update', [BillController::class, 'waterBillUpdate'])->name('water-bill.update');

Route::get('/bills', [BillController::class, 'index'])->middleware(['auth'])->name('bills');
Route::post('/bills/check', [BillController::class, 'check'])->name('bills.check');
Route::get('/bills/pay', [BillController::class, 'pay'])->name('bills.pay');
Route::get('/bills/{id}/my-bill', [BillController::class, 'mybill'])->name('bills.my-bill');
Route::get('/bills/{id}/edit', [BillController::class, 'edit'])->name('bills.my-bill');
Route::post('/bills/{id}/edit/update', [BillController::class, 'update'])->name('bills.update');
Route::get('/bills/{id}/delete', [BillController::class, 'destroy'])->name('bills.delete');
Route::post('/bills/pay/create/store', [BillController::class, 'store'])->name('bills.pay.store');

Route::post('/bill/waterbillprice/update', [BillController::class, 'waterBillUpdate'])->name('bills.waterbill.update');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WisataController;
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
// Route Wisata
Route::post('registWisata', [WisataController::class, 'store'])->name('registWisata');
Route::get('viewWisata', [WisataController::class, 'index'])->name('viewWisata');
Route::get('kelolaWisata', [WisataController::class, 'kelola'])->name('kelolaWisata');
Route::get('getWisata', [WisataController::class, 'getWisata'])->name('getaWisata');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/informasi', function () {
    return view('wisatawan.informasi');
});
Route::get('/pemesanan', function () {
    return view('wisatawan.pemesanan');
});
// Route::get('/mitra', function () {
//     return view('mitra.dashboard')->name('mitra');
// });
Route::get('/mitra', [WisataController::class, 'mitra'])->name('mitra');

// Route Transaksi





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

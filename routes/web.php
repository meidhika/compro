<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\ExpController;


Route::get('user/dashboard', [HomeController::class, 'indexUser'])->middleware(['auth', 'user']);
//Profile
Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('admin/profiles', [ProfController::class, 'index'])->name('profiles.index')->middleware(['auth', 'admin']);
Route::get('admin/profiles/create', [ProfController::class, 'create'])->name('profiles.create')->middleware(['auth', 'admin']);
Route::post('admin/profiles/store', [ProfController::class, 'store'])->name('profiles.store')->middleware(['auth', 'admin']);
Route::get('admin/profiles/edit/{id}', [ProfController::class, 'edit'])->name('profiles.edit')->middleware(['auth', 'admin']);
Route::put('admin/profiles/edit/{id}', [ProfController::class, 'update'])->name('profiles.update')->middleware(['auth', 'admin']);
Route::get('admin/profiles/recycle', [ProfController::class, 'recycle'])->name('profiles.recycle')->middleware(['auth', 'admin']);
Route::get('admin/profiles/restore/{id}', [ProfController::class, 'restore'])->name('profiles.restore')->middleware(['auth', 'admin']);
Route::delete('admin/profiles/softdelete/{id}', [ProfController::class, 'softdelete'])->name('profiles.softdelete')->middleware(['auth', 'admin']);
Route::delete('admin/destroy/{id}', [ProfController::class, 'destroy'])->name('profiles.destroy');
Route::get('profile/generate-pdf{id}', [ProfController::class, 'show'])->name('generate-pdf');

// Experience
Route::get('admin/experience', [ExpController::class, 'index'])->name('experience.index')->middleware(['auth', 'admin']);
Route::get('admin/experience/create', [ExpController::class, 'create'])->name('experience.create')->middleware(['auth', 'admin']);
Route::post('admin/experience/store', [ExpController::class, 'store'])->name('experience.store')->middleware(['auth', 'admin']);
Route::get('admin/experience/edit/{id}', [ExpController::class, 'edit'])->name('experience.edit')->middleware(['auth', 'admin']);
Route::put('admin/experience/edit/{id}', [ExpController::class, 'update'])->name('experience.update')->middleware(['auth', 'admin']);
Route::get('admin/experience/recycle', [ExpController::class, 'recycle'])->name('experience.recycle')->middleware(['auth', 'admin']);
Route::get('admin/experience/restore/{id}', [ExpController::class, 'restore'])->name('experience.restore')->middleware(['auth', 'admin']);
Route::delete('admin/experience/softdelete/{id}', [ExpController::class, 'softdelete'])->name('experience.softdelete')->middleware(['auth', 'admin']);
Route::delete('admin/experience/destroy/{id}', [ExpController::class, 'destroy'])->name('experience.destroy');




Route::get('compro', [ContentController::class, 'index']);
Route::post('admin/profiles/update-status/{id}', [ProfController::class, 'updateStatus'])->name('profiles.update-status');


Route::get('/', function () {
    return view('welcome');
});

Route::get('latihan', [CountController::class, 'index']);
Route::get('penjumlahan', [CountController::class, 'jumlah'])->name('penjumlahan');
Route::get('pengurangan', [CountController::class, 'kurang'])->name('pengurangan');
Route::get('perkalian', [CountController::class, 'kali'])->name('perkalian');
Route::get('pembagian', [CountController::class, 'bagi'])->name('pembagian');


Route::post('storejumlah', [CountController::class, 'storejumlah'])->name('store_penjumlahan');
Route::post('storekurang', [CountController::class, 'storekurang'])->name('store_pengurangan');
Route::post('storeperkalian', [CountController::class, 'storekali'])->name('store_perkalian');
Route::post('storepembagian', [CountController::class, 'storebagi'])->name('store_pembagian');

Route::get('/dashboard', function () {
    if (Auth::user()->id_level === 1) {
        return view('admin.dashboard');
    } elseif (Auth::user()->id_level === 2) {
        return view('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
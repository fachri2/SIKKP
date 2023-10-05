<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerawatanController;
use App\Http\Controllers\PerhitungankaloriController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use App\Models\Pasien;
use App\Models\Perawatan;

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

Route::get('', function () {
    return view('login');
});
//control admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin-dashboard', [AdminController::class, 'index'])->name('admin-dashboard')->middleware('auth');
    Route::get('data-user', [AdminController::class, 'delete'])->name('delete')->middleware('auth');
    Route::delete('data-user/{id}', [UserController::class, 'delete'])->name('deleteUser')->middleware('auth');
    
});
Route::get('register', [AdminController::class, 'regis'])->name('register');
Route::post('register', [UserController::class, 'store'])->name('regis');
    //login & logout
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//edit profil
Route::get('edit', [AdminController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/edit', [UserController::class, 'edit'])->name('admin.update')->middleware('auth');

//kontrol penghapus data pasien
Route::delete('deletePasien/{id}', [PasienController::class, 'delete'])->name('deletePasien')->middleware('auth');
Route::delete('deleteMenu/{id}', [PerawatanController::class, 'delete'])->name('deleteMenu')->middleware('auth');

//route
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('konsultan-dashboard', [HomeController::class, 'indes'])->name('konsultan-dashboard')->middleware('auth');
Route::get('rawatinap-dashboard', [HomeController::class, 'indet'])->name('rawatinap-dashboard')->middleware('auth');
Route::get('dapur-dashboard', [HomeController::class, 'indep'])->name('dapur-dashboard')->middleware('auth');

//rawat inap
Route::get('perawatan', [PerawatanController::class, 'index'])->name('perawatan')->middleware('auth');
Route::post('perawatan', [PerawatanController::class, 'store'])->name('perawatans')->middleware('auth');
Route::get('detailperawatan/{nama_kamar}/{kelas_kamar}', [PerawatanController::class, 'detail'])->name('detailperawatan')->middleware('auth');
Route::get('input-pasien-rawatinap', [HomeController::class, 'inputpasien'])->name('inputpasien')->middleware('auth');
Route::post('/input-pasien', [PasienController::class, 'inputpasien'])->name('input-pasien')->middleware('auth');
Route::get('kelola-pasien-rawatinap', [PerawatanController::class, 'kelola'])->name('kelola-pasien')->middleware('auth');
Route::get('editpasien/{id}', [PerawatanController::class, 'editpasien'])->name('editpasien')->middleware('auth');
Route::post('editpasien/{id}', [PasienController::class, 'updatepasien'])->name('update-pasien')->middleware('auth');

//dapur dan rawat inap
Route::get('detailkamar/{id}', [PerawatanController::class, 'detailkamar'])->name('detailkamar')->middleware('auth');

//dapur
Route::get('kebutuhan-kalori-pasien', [PerawatanController::class, 'menu'])->name('kebutuhan-kalori-pasien')->middleware('auth');


//control perhitungan 
Route::get('perhitungankalori', [AdminController::class, 'inder'])->name('perhitungankalori')->middleware('auth');
Route::post('perhitungankalori/hasil', [PerhitungankaloriController::class, 'store'])->name('hasil')->middleware('auth');
Route::get('visit-pasien-rawatinap', [HomeController::class, 'visitpasien'])->name('visitpasien')->middleware('auth');
Route::get('/visit', [PasienController::class,'visit'])->name('visit')->middleware('auth');
Route::post('/simpan-data', [PasienController::class, 'update'])->name('simpan-data');


//contorl cetak
Route::get('/cetakhasil/{id}', [PasienController::class, 'cetakhasil'])->name('cetakhasil')->middleware('auth');
Route::get('/cetakinap/{id}', [PerawatanController::class, 'cetakinap'])->name('cetakinap')->middleware('auth');



Route::get('data-konsultasi', [AdminController::class, 'rawat'])->name('data-konsultasi')->middleware('auth');
Route::get('detailpasien/{id}', [PasienController::class, 'detail'])->name('detailpasien')->middleware('auth');
//batas Suci

Route::get('data-user', [AdminController::class, 'rekap'])->name('data-user')->middleware('auth');
Route::get('data-user-edit/{user}', [AdminController::class, 'edituser'])->name('data-edit')->middleware('auth');
Route::put('data-user-edit/{user}', [AdminController::class, 'update'])->name('data-update')->middleware('auth');
Route::post('data-user-edit/{user}', [AdminController::class, 'resetPassword'])->name('admin.reset-password')->middleware('auth');
Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('profil', [UserController::class, 'showProfile'])->name('profil')->middleware('auth');

Route::get('/fect-data', [HomeController::class, 'fect_data']);
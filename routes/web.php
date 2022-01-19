<?php

use App\Http\Controllers\admin\GuruController as AdminGuruController;
use App\Http\Controllers\admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\admin\KelasController as AdminKelasController;
use App\Http\Controllers\admin\PerusahaanController as AdminPerusahaanController;
use App\Http\Controllers\admin\KelompokController as AdminKelompokController;

use App\Http\Controllers\siswa\SiswaPerusahaanController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('siswa_perusahaan/perusahaan', [SiswaPerusahaanController::class, 'perusahaan']);

    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::post('home/simpan', [HomeController::class, 'simpan']);
    Route::get('home/get_data', [HomeController::class, 'get_data']);
    Route::get('home/akhiri/{id}', [HomeController::class, 'akhiri']);
    Route::get('home/edit/{id}', [HomeController::class, 'edit']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('admin_siswa', [AdminSiswaController::class, 'index']);
        Route::get('admin_siswa/get_data', [AdminSiswaController::class, 'get_data']);
        Route::post('admin_siswa/simpan', [AdminSiswaController::class, 'simpan']);
        Route::get('admin_siswa/edit/{id}', [AdminSiswaController::class, 'edit']);
        Route::get('admin_siswa/hapus/{id}', [AdminSiswaController::class, 'hapus']);

        Route::get('admin_guru', [AdminGuruController::class, 'index']);
        Route::get('admin_guru/get_data', [AdminGuruController::class, 'get_data']);
        Route::post('admin_guru/simpan', [AdminGuruController::class, 'simpan']);
        Route::get('admin_guru/edit/{id}', [AdminGuruController::class, 'edit']);
        Route::get('admin_guru/hapus/{id}', [AdminGuruController::class, 'hapus']);

        Route::get('admin_kelas', [AdminKelasController::class, 'index']);
        Route::get('admin_kelas/get_data', [AdminKelasController::class, 'get_data']);
        Route::post('admin_kelas/simpan', [AdminKelasController::class, 'simpan']);
        Route::get('admin_kelas/edit/{id}', [AdminKelasController::class, 'edit']);
        Route::get('admin_kelas/hapus/{id}', [AdminKelasController::class, 'hapus']);

        Route::get('admin_perusahaan', [AdminPerusahaanController::class, 'index']);
        Route::get('admin_perusahaan/get_data', [AdminPerusahaanController::class, 'get_data']);
        Route::post('admin_perusahaan/simpan', [AdminPerusahaanController::class, 'simpan']);
        Route::get('admin_perusahaan/edit/{id}', [AdminPerusahaanController::class, 'edit']);
        Route::get('admin_perusahaan/hapus/{id}', [AdminPerusashaanController::class, 'hapus']);

        Route::get('admin_kelompok', [AdminKelompokController::class, 'index']);
        Route::get('admin_kelompok/get_data', [AdminKelompokController::class, 'get_data']);
        Route::get('admin_kelompok/simpan', [AdminKelompokController::class, 'simpan']);
        Route::get('admin_kelompok/get_data_kelompok/{id}', [AdminKelompokController::class, 'get_data_kelompok']);
        Route::get('admin_kelompok/show/{id}', [AdminKelompokController::class, 'show']);
        Route::get('admin_kelompok/konfirmasi/{id}', [AdminKelompokController::class, 'konfirmasi']);
        Route::get('admin_kelompok/batal_konfirmasi/{id}', [AdminKelompokController::class, 'batal_konfirmasi']);
    });
    Route::middleware('guru')->group(function () {

    });
    Route::middleware('siswa')->group(function () {
        Route::get('siswa_perusahaan', [SiswaPerusahaanController::class, 'index']);
        Route::get('siswa_perusahaan/get_data', [SiswaPerusahaanController::class, 'get_data']);
        Route::get('siswa_perusahaan/daftar/{id}', [SiswaPerusahaanController::class, 'daftar']);
        Route::get('siswa_perusahaan/keluar/{id}', [SiswaPerusahaanController::class, 'keluar']);
        Route::get('siswa_perusahaan/daftarkelompok', [SiswaPerusahaanController::class, 'daftarkelompok']);
    });

});

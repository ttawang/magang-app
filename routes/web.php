<?php

use App\Http\Controllers\admin\GuruController as AdminGuruController;
use App\Http\Controllers\admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\admin\KelasController as AdminKelasController;
use App\Http\Controllers\admin\PerusahaanController as AdminPerusahaanController;
use App\Http\Controllers\admin\KelompokController as AdminKelompokController;
use App\Http\Controllers\admin\PenilaianController as AdminPenilaianController;



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


use App\Http\Controllers\siswa\SiswaPerusahaanController;
use App\Http\Controllers\siswa\SiswaLaporanController;
use App\Http\Controllers\siswa\SiswaSertifikatController;


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
    Route::get('home/chart', [HomeController::class, 'chart']);
    Route::get('home/chartperiode', [HomeController::class, 'chartperiode']);
    Route::get('home/chartperusahaan', [HomeController::class, 'chartperusahaan']);
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
        Route::get('admin_kelompok/get_data_cari/{id}', [AdminKelompokController::class, 'get_data_cari']);
        Route::get('admin_kelompok/simpan', [AdminKelompokController::class, 'simpan']);
        Route::get('admin_kelompok/cari/{id}', [AdminKelompokController::class, 'cari']);
        Route::get('admin_kelompok/hapus/{id}/{periode}', [AdminKelompokController::class, 'hapus']);
        Route::get('admin_kelompok/get_data_kelompok/{id}/{periode}', [AdminKelompokController::class, 'get_data_kelompok']);
        Route::get('admin_kelompok/show/{id}', [AdminKelompokController::class, 'show']);
        Route::get('admin_kelompok/konfirmasi/{id}/{periode}', [AdminKelompokController::class, 'konfirmasi']);
        Route::get('admin_kelompok/batal_konfirmasi/{id}/{periode}', [AdminKelompokController::class, 'batal_konfirmasi']);
        Route::get('admin_kelompok/detail/{id}/{periode}', [AdminKelompokController::class, 'detail']);
        Route::get('admin_kelompok/get_data_laporan/{id}/{periode}', [AdminKelompokController::class, 'get_data_laporan']);
        Route::get('admin_kelompok/hapus_siswa/{id}', [AdminKelompokController::class, 'hapus_siswa']);

        Route::get('admin_penilaian', [AdminPenilaianController::class, 'index']);
        Route::get('admin_penilaian/get_data/{id}', [AdminPenilaianController::class, 'get_data']);
        Route::post('admin_penilaian/simpan', [AdminPenilaianController::class, 'simpan']);
        Route::get('admin_penilaian/get_kelompok/{id}/{periode}', [AdminPenilaianController::class, 'get_kelompok']);
        Route::get('admin_penilaian/get_perusahaan/{id}', [AdminPenilaianController::class, 'get_perusahaan']);
        Route::get('admin_penilaian/cari/{id}', [AdminPenilaianController::class, 'cari']);
    });

    Route::middleware('siswa')->group(function () {
        Route::get('siswa_perusahaan', [SiswaPerusahaanController::class, 'index']);
        Route::get('siswa_perusahaan/get_data', [SiswaPerusahaanController::class, 'get_data']);
        Route::get('siswa_perusahaan/daftar/{id}', [SiswaPerusahaanController::class, 'daftar']);
        Route::get('siswa_perusahaan/keluar/{id}', [SiswaPerusahaanController::class, 'keluar']);
        Route::get('siswa_perusahaan/daftarkelompok', [SiswaPerusahaanController::class, 'daftarkelompok']);

        Route::get('siswa_laporan',[SiswaLaporanController::class,'index']);
        Route::get('siswa_laporan/get_data',[SiswaLaporanController::class,'get_data']);
        Route::post('siswa_laporan/simpan',[SiswaLaporanController::class,'simpan']);
        Route::get('siswa_laporan/edit/{id}',[SiswaLaporanController::class,'edit']);
        Route::get('siswa_laporan/cetak',[SiswaLaporanController::class,'cetak']);

        Route::get('siswa_sertifikat',[SiswaSertifikatController::class,'index']);
        Route::get('siswa_sertifikat/cetak',[SiswaSertifikatController::class,'cetak']);
        Route::get('siswa_sertifikat/test/{id}',[SiswaSertifikatController::class,'test']);
    });

});

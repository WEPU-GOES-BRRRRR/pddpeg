<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FamilyController;
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
    return redirect()->route('pegawai.index');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/pegawai', 'index')->name('pegawai.index');
    Route::get('/pegawai/tambah', 'add')->name('pegawai.add');
    Route::get('/pegawai/edit/{employee}', 'edit')->name('pegawai.edit');
    Route::get('/pegawai/detail/{employee}', 'detail')->name('pegawai.detail');

    Route::post('/pegawai/store', 'store')->name('pegawai.store');

    Route::put('/pegawai/update/{employee}', 'update')->name('pegawai.update');

    Route::delete('/pegawai/hapus/{employee}', 'delete')->name('pegawai.hapus');
});

Route::controller(FamilyController::class)->group(function () {
    Route::get('/keluarga', 'index')->name('pegawai.keluarga.index');

    Route::get('/keluarga/{employee}/get', 'getFamilyData');
});

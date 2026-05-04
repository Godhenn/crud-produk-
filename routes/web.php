<?php

use App\Http\Controllers\MahasiswaController;

Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);

Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
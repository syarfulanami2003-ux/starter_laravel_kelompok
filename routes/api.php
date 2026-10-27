<?php

use Illuminate\Support\Facades\Route;

// Endpoint awal untuk pengujian API Flutter dan Laravel
Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'message' => 'API Laravel berhasil dijalankan'
    ]);
});
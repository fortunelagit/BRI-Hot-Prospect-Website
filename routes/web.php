<?php

use Illuminate\Support\Facades\Route;
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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session')
    // ,'verified'
])->group(function () {
    
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::group(['middleware' => 'auth'], function(){
    Route::resource('prospect', \App\Http\Controllers\ProspectController::class);
    Route::resource('prospect-saya', \App\Http\Controllers\ProspectSayaController::class);
    Route::resource('prospect-uker', \App\Http\Controllers\ProspectUkerController::class);
    Route::resource('prospect-branch', \App\Http\Controllers\ProspectBranchController::class); 
    
    Route::resource('progress', \App\Http\Controllers\ProgressController::class);
    Route::resource('progress-saya', \App\Http\Controllers\ProgressSayaController::class);
    Route::resource('progress-uker', \App\Http\Controllers\ProgressUkerController::class);
    Route::resource('progress-branch', \App\Http\Controllers\ProgressBranchController::class);

    Route::resource('realisasi', \App\Http\Controllers\RealisasiController::class);
    Route::resource('realisasi-saya', \App\Http\Controllers\RealisasiSayaController::class);
    Route::resource('realisasi-uker', \App\Http\Controllers\RealisasiUkerController::class);
    Route::resource('realisasi-branch', \App\Http\Controllers\RealisasiBranchController::class);

    
    Route::get('notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notifications-all');
    Route::get('notification/{notification}', 
                [\App\Http\Controllers\NotificationController::class, 'show'])
                ->name('notifications-detail');

    Route::get('section-dropdown', [\App\Http\Controllers\SectorDropdownController::class, 'index']);
    Route::post('api/fetch-subsector', [\App\Http\Controllers\SectorDropdownController::class, 'fetchSubSector']);
    Route::post('api/fetch-definition', [\App\Http\Controllers\SectorDropdownController::class, 'fetchDefinition']);
    Route::post('api/fetch-lpg', [\App\Http\Controllers\SectorDropdownController::class, 'fetchLPG']);

    Route::get('report', [\App\Http\Controllers\ReportController::class, 'index'])->name('generate-report');
    Route::post('filter', [\App\Http\Controllers\ReportController::class, 'filter'])->name('filter-report');

    Route::get('ranking', [\App\Http\Controllers\RankingController::class, 'index'])->name('show-ranking');

    Route::get('permission', [\App\Http\Controllers\UserPermissionController::class, 'index'])->name('set-permission');
    Route::post('permission', [\App\Http\Controllers\UserPermissionController::class, 'store'])->name('permission-update');

    Route::get('komitmen', [\App\Http\Controllers\KomitmenController::class, 'index'])->name('target-komitmen');
});

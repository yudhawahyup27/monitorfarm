<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;

Route::middleware(['checkLoggedIn'])->group(function () {
    // Add your protected routes here
    Route::get('/dashboard',[FirebaseController::class, "getDataDashboards"])->name('dashboard');

    Route::get('/create-user', function () {
        return view('pegawai.create-pegawai');
    })->name('create-user');


    Route::post('/create-user', [FirebaseController::class, 'createUser'])->name('createUser');

    Route::get('/user/delete/{id}', [FirebaseController::class, 'deleteDataUser'])->name('user.delete');

    Route::get('/user/edit/{id}', [FirebaseController::class, 'editUser'])->name('user.edit');
    Route::patch('/user/update/{id}', [FirebaseController::class, 'updateDataUser'])->name('user.update');



    Route::get('/pegawai', [FirebaseController::class, 'getDataUser'])->name('getDataUser');

});

Route::get('/monitoring-makan/ayam-kecil', [FirebaseController::class, 'showMonitoringMakan']);
    Route::get('/monitoring-makan/ayam-sedang', [FirebaseController::class, 'showMonitoringMakan2']);
    Route::get('/monitoring-makan/ayam-besar', [FirebaseController::class, 'showMonitoringMakan3']);
    Route::get('/monitoring-minum', [FirebaseController::class, 'showMonitoringMinum'])->name('showMonitoringMinum');
Route::get('/monitoring-suhu', [FirebaseController::class, 'getDataSuhu'])->name('getDataSuhu');
Route::post('/logout', [FirebaseController::class, 'logout'])->name('logout');

Route::get('/export-feeding-history3', [FirebaseController::class, 'exportFeedingHistory3'])->name('exportFeedingHistory3');
Route::get('/export-feeding-history2', [FirebaseController::class, 'exportFeedingHistory2'])->name('exportFeedingHistory2');
Route::get('/export-feeding-history1', [FirebaseController::class, 'exportFeedingHistory1'])->name('exportFeedingHistory1');
Route::post('/', [FirebaseController::class, 'login'])->name('login.submit');
//  Monitoring Data


// Route::get('/', [FirebaseController::class, 'Dashboard']);

Route::get('/', function () {
    return view('auth.login');
})->name('login');

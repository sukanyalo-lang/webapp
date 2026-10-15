<?php

use App\Http\Livewire\DiseaseReportCrud;
use App\Http\Livewire\DiseaseStats;
use App\Services\BlvAnimalHealthService;
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
    return view('welcome');
})->name('home');
Route::get('/pets', function () {
    return view('pets');
})->name('pets');
Route::get('/report', function () {
    return view('report');
})->name('report');
Route::get('/clue', function () {
    return view('clue');
})->name('clue');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// ดีบัก BLV API: แทน /test-api เดิม (Dog API) -> ดึง descriptor.json แล้ว parse CSV คืน 5 แถวแรก
Route::get('/test-blv', function (BlvAnimalHealthService $svc) {
    return response()->json([
        'csv_url' => $svc->resolveCsvUrl(),
        'sample' => array_slice($svc->fetchRows(), 0, 5),
        'total_cached' => count($svc->fetchRows()),
    ]);
})->name('test-blv');

// หน้าแสดงสถิติ (public) ดีไซน์ Pet Finder
Route::get('/disease-stats', function () {
    return view('disease-stats');
})->name('disease-stats');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/users', function () {
        return view('users');
    })->name('users');

    Route::get('/addusers', function () {
        return view('adduser');
    })->name('addusers');
    
    Route::get('/edituser/{id}', function ($id) {
        return view('edituser', compact('id'));
    })->name('edituser');

    Route::get('/disease-reports', function () {
        return view('disease-reports');
    })->name('disease-reports');
});

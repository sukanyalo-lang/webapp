<?php

use App\Http\Controllers\PetReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'pets' => \App\Models\PetReport::whereIn('status', ['lost', 'found'])->latest()->take(6)->get(),
        'lostCount' => \App\Models\PetReport::where('status', 'lost')->count(),
        'foundCount' => \App\Models\PetReport::where('status', 'found')->count(),
    ]);
})->name('home');

Route::get('/pets', [PetReportController::class, 'index'])->name('pets');
Route::get('/report', [PetReportController::class, 'create'])->name('report');
Route::post('/report', [PetReportController::class, 'store'])->middleware('auth')->name('report.store');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::middleware(['auth', config('jetstream.auth_session')])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/users', fn () => view('users'))->name('users');
    Route::get('/addusers', fn () => view('adduser'))->name('addusers');
    Route::get('/edituser/{id}', fn ($id) => view('edituser', compact('id')))->name('edituser');
    Route::view('/manage-pets', 'pet-reports')->name('pet-reports');
    Route::get('/my-reports', [PetReportController::class, 'myReports'])->name('my-reports');
    Route::patch('/my-reports/{petReport}/status', [PetReportController::class, 'updateStatus'])->name('my-reports.status');
    Route::delete('/my-reports/{petReport}', [PetReportController::class, 'destroy'])->name('my-reports.destroy');
});

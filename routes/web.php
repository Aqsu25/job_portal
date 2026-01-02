<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('homes.home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // users
    Route::resource('/users', UserController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // my-profile
    Route::get('/myprofile', [ProfileController::class, 'profileshow'])->name('myprofile');
    // my-profile-store
    Route::post('/myprofile/store', [ProfileController::class, 'profilestore'])->name('myprofile.store');
    // update-profile-pic
    Route::post('updatepic/myprofile', [ProfileController::class, 'updateProfilepic'])->name('updateprofile.pic');

    //  job
    Route::resource('/job_portal', JobController::class);
    // company-create
    Route::get('/job_portal/createCompany', [JobController::class, 'createCompany'])->name('createCompany');
    // company-store
    Route::post('/job_portal/storeCompany', [JobController::class, 'storeCompany'])->name('storeCompany');
// company
    Route::resource('/companies', CompanyController::class);
});

// ADMIN
Route::resource('/roles', RoleController::class);
Route::resource('/permissions', PermissionController::class);
Route::middleware(['auth', 'admin'])->group(function () {
    // roles
    //   permissions
});


require __DIR__ . '/auth.php';

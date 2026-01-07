<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, 'home'])->name('home');


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

    // categories
    Route::resource('/categories', CategoryController::class);

    // types
    Route::resource('/types', TypeController::class);

    //  job
    Route::resource('/job_portal', JobController::class);

    // company
    Route::resource('/companies', CompanyController::class);
});

// find-job
Route::match(['get', 'post'], '/findjob', [JobController::class, 'findJob'])->name('find.jobs');
// job-detail
Route::get('/job/detail/{id}', [JobController::class, 'detail'])->name('job_portal.detail');

// apply-job
Route::get('/apply_job/{id}', [JobController::class, 'applyjob'])->name('apply.job');
// job-applied
Route::get('/job_applied', [JobController::class, 'applied'])->name('job.applied');

// job-applied-delete
Route::delete('/job_applied/{id}', [JobController::class, 'removeApplication'])->name('remove.application');


// ADMIN
Route::resource('/roles', RoleController::class);
Route::resource('/permissions', PermissionController::class);
Route::middleware(['auth', 'admin'])->group(function () {
    // roles
    //   permissions
});


require __DIR__ . '/auth.php';

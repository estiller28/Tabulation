<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CoAdmin\CoAdminController;
use App\Http\Controllers\RoleCheckerController;
use App\Http\Controllers\testController;
use App\Http\Controllers\Home\UpdateDogStatusController;

Route::get('/', function () {
   return view('auth.login');
});

Route::get('/update/dog-status', [UpdateDogStatusController::class, 'index'])->name('update.index');
Route::middleware(['auth'])->group(function() {
    //RoleChecker
    Route::get('/dashboard', [RoleCheckerController::class, 'roleCheck']);

    //Admin Routes
    Route::group(['middleware' => ['role:Admin']], function () {

//        Route::get('/test', [testController::class, 'index'])->name('test');

//        Route::prefix('/admin')->group(function(){
//            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
//            Route::get('/dogs', [AdminController::class, 'manageDogs'])->name('dogs.index');
//            Route::get('/dogs/create', [AdminController::class, 'dogsCreate'])->name('dogs.create');
//            Route::get('/dog/edit/{dog}', [AdminController::class, 'show'])->name('dog.edit');
//            Route::get('user/create', [AdminController::class, 'createUsers'])->name('user.create');
//            Route::get('/manage/users', [AdminController::class, 'manageUsers'])->name('users.index');
//            Route::get('/user/edit/{user}', [AdminController::class, 'editUser'])->name('user.edit');
//            Route::get('/profile', [AdminController::class, 'userProfile'])->name('user.profile');
//        });

        Route::prefix('tabulation')->group(function(){
            Route::get('/candidates', [AdminController::class, 'candidates'])->name('candidates.index');
            Route::get('/create/candidates', [AdminController::class, 'addCandidate'])->name('candidates.create');
            Route::get('/{candidate}/rate', [AdminController::class, 'rate'])->name('candidates.rate');
            Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
            Route::get('/results', [AdminController::class, 'results'])->name('results');
        });
    });

    //CoAdmin Routes
//    Route::group(['middleware' => ['role:CoAdmin']], function () {
//
//        Route::prefix('co-admin')->group(function(){
//            Route::get('/dashboard', [CoAdminController::class, 'dashboard'])->name('coAdminDashboard');
//            Route::get('/dogs', [CoAdminController::class, 'manageDogs'])->name('coAdminDogs.index');
//            Route::get('/dogs/create', [CoAdminController::class, 'dogsCreate'])->name('coAdminDogs.create');
//            Route::get('/dog/edit/{dog}', [CoAdminController::class, 'show'])->name('coAdminDogs.edit');
//            Route::get('/profile', [CoAdminController::class, 'coAdminUserProfile'])->name('co-admin-user.profile');
//        });
//    });

});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LogController;
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
});

Route::get('/dashboard', function () {
    if(!session('logged')){
        (new LogController)->log_last();
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users',[UserController::class,'index'])->name('users.list');
Route::get('/students',[StudentController::class,'index'])->name('students.list')
                                                          ->middleware('access:read');
Route::get('/roles',[RoleController::class,'index'])->name('roles.list');
Route::get('/roles/{id}/permissions',[RoleController::class,'permissions'])->name('roles.permissions');
Route::get('/roles/{id}/removal',[RoleController::class,'perm_remover'])->name('roles.perm_remover');
Route::get('/permissions',[PermissionController::class,'index'])->name('permissions.list');
Route::post('add_perm',[RoleController::class,'add_perm'])->name('add_perm');
Route::post('rem_perm',[RoleController::class,'rem_perm'])->name('rem_perm');

require __DIR__.'/auth.php';

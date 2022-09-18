<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ManageMaterialController;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => ['auth']], function() {
    // Route for dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

    // Route for category crud
    Route::get('/category/list', [CategoryController::class, 'list']);
    Route::get('/category/add', [CategoryController::class, 'add']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/category/update', [CategoryController::class, 'update']);
    Route::post('/category/delete', [CategoryController::class, 'delete']);
    Route::get('/category/trash', [CategoryController::class, 'getTrash']);
    Route::post('/category/restore', [CategoryController::class, 'restore']);
    Route::post('/category/delete-forever', [CategoryController::class, 'deleteForever']);

    // Route for material crud
    Route::get('/material/list', [MaterialController::class, 'list']);
    Route::get('/material/add', [MaterialController::class, 'add']);
    Route::post('/material/store', [MaterialController::class, 'store']);
    Route::get('/material/edit/{id}', [MaterialController::class, 'edit']);
    Route::post('/material/update', [MaterialController::class, 'update']);
    Route::post('/material/delete', [MaterialController::class, 'delete']);
    Route::get('/material/trash', [MaterialController::class, 'getTrash']);
    Route::post('/material/restore', [MaterialController::class, 'restore']);
    Route::post('/material/delete-forever', [MaterialController::class, 'deleteForever']);

    // Route for add inward and outwand and for manage material
    Route::get('/manage-material/list', [ManageMaterialController::class, 'list']);
    Route::get('/manage-material/add', [ManageMaterialController::class, 'add']);
    Route::post('/manage-material/store', [ManageMaterialController::class, 'store']);

    // Route for user profile
    Route::get('/user/profile', [UserController::class, 'profile']);
    Route::post('/user/profile/save', [UserController::class, 'saveProfile']);
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

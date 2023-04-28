<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Task\BrandController;
use App\Http\Controllers\Task\ProductController;
use App\Http\Controllers\Task\CategoryController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// rotas admin  controle de usuario
Route::middleware('auth')->group(function () {

    Route::get('/dashboard/users', [UserController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/dashboard/user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/dashboard/user/store', [UserController::class, 'store'])->name('user.store');
    Route::put('/dashboard/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::delete('/dasboard/user/delete/', [UserController::class, 'delete'])->name('user.delete');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard/product/', [ProductController::class, 'index'])->name('product');
    Route::get('/dashboard/brand/', [BrandController::class, 'index'])->name('brand');
    Route::get('/dashboard/category/', [CategoryController::class, 'index'])->name('category');
});

require __DIR__ . '/auth.php';

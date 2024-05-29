<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SupplierController;

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
    return view('testing');
});

Route::get('/kelola-produk', [ProductController::class, 'viewIndex'])->name('kelola');

Route::get('/tambah-produk', function () {
    return view('produk.create');
});

Route::post('/kelola-produk/create', [ProductController::class, 'create'])->name('tambah');

Route::delete('/kelola-produk/delete/{id}', [ProductController::class, 'delete'])->name('hapus');

Route::get('/edit-produk/{id}', [ProductController::class, 'viewEdit'])->name('edit');

Route::post('/edit-produk/{id}/store', [ProductController::class, 'edit'])->name('store.edit');

// Rute untuk login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk registrasi
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Rute untuk home dan dashboard berdasarkan akses pengguna
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

Route::get('/kelola-supplier', [SupplierController::class, 'viewIndex'])->name('kelola');

Route::get('/tambah-supplier', function () {
    return view('suppliers.create');
});

Route::post('/kelola-supplier/create', [SupplierController::class, 'create'])->name('tambah');

Route::get('/edit-supplier/{id}', [SupplierController::class, 'viewEdit'])->name('edit');

Route::post('/edit-suppllier/{id}/store', [SupplierController::class, 'edit'])->name('store.edit');

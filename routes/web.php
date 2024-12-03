<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerLogin;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\manufacturerController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfController;

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
    return view('home.index');
});

Route::get('/about', [homeController::class, 'about'])->name('about');
Route::get('/about', [homeController::class, 'about'])->name('about');



//  Route::get('/dashboard', [manufacturerController::class, 'index'])
//  ->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/client/dashboard', [ClientDashboardController::class, 'index'])->name('client.dashboard');
    Route::get('/dashboard', [manufacturerController::class, 'index'])->name('dashboard');
    // Route::get('/supplier/dashboard', [SupplierDashboardController::class, 'index'])->name('supplier.dashboard');
});


// Route::get('/dashboard', [registerLogin::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/materialss', '[MaterialController]@store');
 Route::post('/profile/upload', [ProfController::class, 'uploadProfileImage'])->name('profile.upload');
Route::post('/materialss', [MaterialController::class, 'store'])->name('materials.store');
// Route::post('/submit-form', [MaterialController::class,'submitForm'])->name('submit-form');
// Route::get('/success', function () { 
    
//     return view('form.success');})->name('form.success');

// profile picture
Route::post('/profile/update-picture', [ProfileController::class, 'updateProfilePicture'])
    ->name('profile.update-picture');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

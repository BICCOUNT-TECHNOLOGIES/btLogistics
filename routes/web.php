<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerLogin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FormController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\manufacturerController;

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
    
    Route::get('/dashboard', [manufacturerController::class, 'index'])->name('dashboard');
    
});




Route::post('/materialss', '[MaterialController]@store');

Route::post('/materialss', [MaterialController::class, 'store'])->name('materials.store');

// profile picture

// profileController Routes

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile-picture', 'getProfile')->name('profile');       // get Profile details
    Route::post('/edit-picture', 'editProfile')->name('edit');    // Edit user details
    
});


//    manufacturer profile
    Route::get('/user/{id}', [ManufacturerController::class, 'show'])->name('manufacturer.profile');

    // manufacturer edit, delete button
Route::get('/user', [ManufacturerController::class, 'edit'])->name('manufacturer.edit');
 Route::put('/manufacturer', [ManufacturerController::class, 'delete'])->name('manufacturer.delete');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});



// upload profile
Route::get('/profile/{id}/picture', [ProfileController::class, 'getProfilePicture']);
Route::get('/profile', [ProfileController::class, 'showProfile']);

// Route::post('/profile/upload', [ProfileController::class, 'uploadProfilePicture'])->name('profile.upload');



// logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to homepage or login page
})->name('logout');


require __DIR__.'/auth.php';

<?php
use App\Http\Controllers\dashController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\categoriesController;
use Illuminate\Support\Facades\Route;
use APP\Models\User;
use App\Models\Categories;
// Route::get('/home', function () {
//     return view('layouts.main');
// });
// Route::get('/users', function () {
//     $users = User::all();
//     return view('layouts.users',compact('users'))})->name('users');
Route::post('insertClient',[dashController::class,'store'])->name('insertClient');
Route::get('users',[dashController::class,'index'])->name('users');
Route::get('addUser',[dashController::class,'create'])->name('addUser');
Route::get('editUsers/{id}',[dashController::class,'edit'])->name('editUsers');

// Route::post('insertClient',[dashController::class,'store'])->name('insertClient');
Route::post('insertCategories',[categoriesController::class,'store'])->name('insertCategories');
Route::get('categories',[categoriesController::class,'index'])->name('categories');
Route::get('addCategory',[categoriesController::class,'create'])->name('aaddCategory');
Route::get('editCategories/{id}',[categoriesController::class,'edit'])->name('editCategories');
Route::delete('delCategories',[categoriesController::class,'destroy'])->name('delCategories');
Route::get('/', function () {
    if(auth()->check())
        return view('home');
    return view('welcome');
});

Route::get('/dashboard', function () {
    $users = User::all();
    // $admins = User::whereAdmin(1)->get();
    // $messages = Messages::where('read', 0)->count();
    return view('dashboard', compact('users'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use APP\Models\User;
Route::get('/home', function () {
    return view('layouts.main');
});

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

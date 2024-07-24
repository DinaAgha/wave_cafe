<?php
use App\Http\Controllers\beverageController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ContactController;
use App\Models\Beverages;
use Illuminate\Support\Facades\Route;
use APP\Models\User;
use App\Models\Categories;

Route::get('/home', function () {
    $categories = Categories::all();
    $special = Beverages::whereSpecial(1)->get();
    return view('layouts.main', compact('categories', 'special'));
});
// Route::get('/users', function () {
//     $users = User::all();
//     return view('layouts.users',compact('users'))})->name('users');
Route::post('insertClient',[dashController::class,'store'])->name('insertClient');
Route::get('users',[dashController::class,'index'])->name('users');
Route::get('addUser',[dashController::class,'create'])->name('addUser');
Route::post('addUser',[dashController::class,'store'])->name('storeUser');
Route::get('editUsers/{id}',[dashController::class,'edit'])->name('editUsers');
Route::put('updateUser/{id}',[dashController::class,'update'])->name('updateUser');
Route::delete('delUsers',[dashController::class,'destroy'])->name('delUsers');
Route::delete('forceDeleteUsers',[dashController::class,'forceDelete'])->name('forceDeleteUsers');
Route::get('trashUsers',[dashController::class,'trash'])->name('trashUsers');


Route::post('beverages', [beverageController::class, 'store'])->name('beverages.store');
// Route::post('insertBeverages',[beverageController::class,'store'])->name('insertBeverages');
Route::get('beverages',[beverageController::class,'index'])->name('beverages');
Route::get('addBevereg',[beverageController::class,'create'])->name('addBevereg');
Route::post('addBevereg',[beverageController::class,'store'])->name('storeBevereg');
Route::get('editBevereg/{id}',[beverageController::class,'edit'])->name('editBevereg');
Route::put('updateBevereg/{id}',[beverageController::class,'update'])->name('updateBevereg');
Route::delete('delBevereg',[beverageController::class,'destroy'])->name('delBevereg');

Route::delete('forceDeleteBevereg/{bevereges}',[beverageController::class,'delete'])->name('forceDeleteBevereg');

Route::get('trashBevereg',[beverageController::class,'trash'])->name('trashBevereg');
Route::get('restoreBevereg/{id}',[beverageController::class,'restore'])->name('restoreBevereg');


// Route::post('insertClient',[dashController::class,'store'])->name('insertClient');
Route::post('insertCategories',[categoriesController::class,'store'])->name('insertCategories');
Route::get('categories',[categoriesController::class,'index'])->name('categories');
Route::get('addCategory',[categoriesController::class,'create'])->name('addCategory');
Route::get('editCategories/{id}',[categoriesController::class,'edit'])->name('editCategories');
Route::get('showCategory/{id}',[categoriesController::class,'show'])->name('showCategory');
Route::put('updateCategory/{id}', [categoriesController::class, 'update'])->name('updateCategory');
Route::delete('delCategories',[categoriesController::class,'destroy'])->name('delCategories');

Route::delete('forceDeleteCategory/{category}',[categoriesController::class,'delete'])->name('forceDeleteCategory');
Route::get('trashCategory',[categoriesController::class,'trash'])->name('trashCategory');
Route::get('restoreCategory/{id}',[categoriesController::class,'restore'])->name('restoreCategory');






Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('messages', [ContactController::class, 'index'])->name('messages.index');
Route::get('messages/{id}', [ContactController::class, 'show'])->name('messages.show');
Route::post('messages/delete', [ContactController::class, 'destroy'])->name('delCategories');
Route::get('/messages/count', [ContactController::class, 'count'])->name('messages.count');

Route::post('recForm1', [MyController::class,'receiveData'])->name('receiveForm1');

Route::get('genEmail', [MyController::class,'generalMail']);

Route::get('mySession', [MyController::class,'myVal']);

Route::get('restoreSession', [MyController::class,'restoreVal']);

Route::get('deleteVal', [MyController::class,'deleteVal']);
Route::get('sendClientMail', [MyController::class,'sendClientMail']);

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

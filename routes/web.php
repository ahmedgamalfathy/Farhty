<?php
use App\Http\Controllers\Dashboard\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\RegisterController;

Route::middleware('auth:admin')->group(function(){
    Route::get('/', function () { return view('welcome'); })->name('home');
    Route::post('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/admin_all',[AdminController::class,'index'])->name('admins');

    Route::resource('admins', AdminController::class);
    Route::resource('packages',PackageController::class);
    Route::resource('questions',QuestionController::class);
    Route::resource('banners',BannerController::class);
    Route::resource('platforms',PlatformController::class);
    Route::resource('contacts',ContactsController::class);
    //search in system
    Route::get('/search',[SearchController::class,'search'])->name('search');
    Route::get('/contact_search',[SearchController::class,'contact_search'])->name('contacts.search');
    // Route::get('/back', function ($id) { return back();})->name('back');
    //Privacy show and edit
    Route::get('privacy',[SettingController::class,'privacy'])->name('privacy');
    Route::get('privacy_edit/{id}',[SettingController::class,'privacy_edit'])->name('privacy.edit');
    Route::post('privacy_update/{id}',[SettingController::class,'privacy_update'])->name('privacy.update');
   //conditions show and edit
    Route::get('condition',[SettingController::class,'condition'])->name('condition');
    Route::get('condition_edit/{id}',[SettingController::class,'condition_edit'])->name('condition.edit');
    Route::post('condition_update/{id}',[SettingController::class,'condition_update'])->name('condition.update');
   //users->posts && user->compettions & الحسابات المشهورة
   Route::get('users',[UserController::class,'users'])->name('users');
   Route::get('users/{id}/posts',[UserController::class,'posts'])->name('user.posts');
   Route::get('users/{id}/competitions',[UserController::class,'competition'])->name('user.comp');
   //show winners
   Route::get('competitions/{id}',[UserController::class,'winners'])->name('comp.winners');
    // Route::post('admin/{id}/update',[UpdateProfileController::class,'update']);

});

Route::middleware('guest:admin')->group(function(){
    Route::post('/login',[LoginController::class,'login']);
    Route::get('/login',[LoginController::class,'create'])->name('login');
});
Route::post('/register',[AdminController::class,'store']);
Route::get('/register_view',[RegisterController::class,'create']);

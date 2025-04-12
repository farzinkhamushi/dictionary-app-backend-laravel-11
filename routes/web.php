<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class,'login'])->name('admin.login');
Route::post('/admin/auth', [AdminController::class,'auth'])->name('admin.auth');

//->middleware('admin')
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('dashboard', [AdminController::class,'index'])->name('admin.index');
    Route::post('logout', [AdminController::class,'logout'])->name('admin.logout');
    //words routes
    Route::resource('words',WordController::class);
});

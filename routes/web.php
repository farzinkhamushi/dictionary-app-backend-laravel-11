<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\WordController;
use App\Http\Controllers\Admin\DefinitionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class,'login'])->name('admin.login');
Route::post('/admin/auth', [AdminController::class,'auth'])->name('admin.auth');

//->middleware('admin')
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('dashboard', [AdminController::class,'index'])->name('admin.index');
    Route::post('logout', [AdminController::class,'logout'])->name('admin.logout');
    //words routes
    Route::resource('words',WordController::class, [
        'names' => [
            'index' => 'admin.words.index',
            'create' => 'admin.words.create',
            'store' => 'admin.words.store',
            'edit' => 'admin.words.edit',
            'update' => 'admin.words.update',
            'destroy' => 'admin.words.destroy',
        ]
    ]);

    //definitions routes
    Route::resource('definitions',DefinitionController::class, [
        'names' => [
            'index' => 'admin.definitions.index',
            'create' => 'admin.definitions.create',
            'store' => 'admin.definitions.store',
            'edit' => 'admin.definitions.edit',
            'update' => 'admin.definitions.update',
            'destroy' => 'admin.definitions.destroy',
        ]
    ]);

});

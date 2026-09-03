<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Fixe\FixeController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\IncidentController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return redirect('login');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'fixeMiddleware'])->group(function () {

    Route::get('/dashboard', [FixeController::class,'index'])->name('dashboard');
    Route::get('/zone', [IncidentController::class,'zone'])->name('zone');
    Route::get('/euga', [IncidentController::class,'euga'])->name('euga');
    Route::post('/incident_recherche',[IncidentController::class,'incident_recherche'])->name('incident_recherche');
    Route::post('/euga_recherche',[IncidentController::class,'euga_recherche'])->name('euga_recherche');
});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {

    Route::get('/dashboard', [AdminController::class,'index'])->name('dashboard');
    Route::get('/zone', [IncidentController::class,'zone'])->name('zone');
    Route::get('/euga', [IncidentController::class,'euga'])->name('euga');
    Route::post('/incident_recherche',[IncidentController::class,'incident_recherche'])->name('incident_recherche');
    Route::get('/admin/users',[AdminController::class,'users'])->name('admin.users');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('addmin.profile');

    Route::get('/admin/edit_user/{id}', [AdminController::class,'edit_user'])->name('user/edit_user');
    //Route::get('/admin/delete_user/{id}', [AdminController::class,'delete_user'])->name('user/delete_user');
    Route::get('/admin/add_user', [AdminController::class,'add_user'])->name('user/add_user');
    Route::post('/admin/update_user/{id}',[AdminController::class,'update_user'])->name('admin.update_user');
    Route::post('/admin/insert_user',[AdminController::class,'insert_user'])->name('admin.insert_user');
    Route::delete('/admin/delete_user/{id}', [AdminController::class, 'delete_user'])->name('admin.delete_user');
    Route::post('/admin/changePassword/{id}', [AdminController::class,'ChangePassword'])->name('user.changePassword');
    Route::post('/euga_recherche',[IncidentController::class,'euga_recherche'])->name('euga_recherche');

});


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

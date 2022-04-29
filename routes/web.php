<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // return view('dashboard');
return redirect()->route('admin.dashboard');

    })->name('dashboard');
});

Route::prefix('admin')->group(function(){
    Route::controller(AdminController::class)->group(function () {

    Route::get('/dashboard', 'admin_dashboard')->name('admin.dashboard');
    // view profile 
    Route::get('/profile/view', 'admin_view_profile')->name('view.profile');
    //Edit profile 
    Route::get('/profile/edit', 'admin_edit_profile')->name('admin.edit.profile');
    //update profile 
    Route::post('/profile/update', 'admin_update_profile')->name('admin.update.profile');


});
});
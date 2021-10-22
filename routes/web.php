<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserHasRole;
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

Route::group(['middleware' => ['role:admin']], function () {
    Route::put('/storeUpdateAdmin/{id}','App\Http\Controllers\AdminController@storeUpdateAdmin')->name('admin.update');
    Route::delete('admin/task/{task}','App\Http\Controllers\AdminController@deleteAdmin')->name('admin.delete');
    Route::get('/createAdmin','App\Http\Controllers\AdminController@createAdmin')->name('admin.createAdmin');
    Route::get('/users','App\Http\Controllers\AdminController@getUsersAdmin')->middleware(['auth'])->name('admin.users');
    Route::post('admin/store','App\Http\Controllers\AdminController@storeAdmin')->name('admin.store');
    Route::get('/taskCompleted','App\Http\Controllers\AdminController@getTasksCompleted')->name('admin.taskCompleted');
    Route::get('/taskActive','App\Http\Controllers\AdminController@getTasksActive')->name('admin.taskActive');
    Route::get('/editUser/{id}','App\Http\Controllers\AdminController@editUsersAdmin')->name('admin.editUser');
 
});

Route::group(['middleware' => ['role:user']], function () {
    Route::get('/','App\Http\Controllers\TaskController@getTasks')->name('tasks.index');
    Route::post('/store','App\Http\Controllers\TaskController@store')->name('tasks.store');
    Route::get('/store','App\Http\Controllers\TaskController@create')->name('tasks.create');
    Route::delete('/task/{task}','App\Http\Controllers\TaskController@delete')->name('tasks.delete');
    Route::get('/update/{id}','App\Http\Controllers\TaskController@update')->name('tasks.update');
    Route::put('/storeUpdate/{id}','App\Http\Controllers\TaskController@storeUpdate')->middleware(EnsureUserHasRole::class)->name('tasks.storeUpdate');
    Route::put('/storeUpdateUsers/{id}','App\Http\Controllers\TaskController@storeUpdateUsers')->name('admin.storeUpdateUsers');
    Route::get('/welcome','App\Http\Controllers\TaskController@welcome')->name('welcome');
    Route::put('/updateTaskStatusActive/{id}','App\Http\Controllers\TaskController@updateTaskStatusActive')->name('tasks.updateTaskStatusActive');
    Route::put('/updateTaskStatusCompleted/{id}','App\Http\Controllers\TaskController@updateTaskStatusCompleted')->name('tasks.updateTaskStatusCompleted');
});


Route::get('/admin', 'App\Http\Controllers\TaskController@getTasksAdmin')->middleware(EnsureUserHasRole::class)->name('admin.admin');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');








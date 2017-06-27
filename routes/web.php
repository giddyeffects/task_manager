<?php
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tasks','TaskController');

Route::get('/categories', function () {
    return App\Category::all();
});

Route::get('/gettheusers', function () {
    return App\User::select('id','firstname','lastname')->where([ ['id','<>',Auth::id()], ['vacation','=',0] ])->get();
});

Route::get('/statuses', function () {
    return App\Status::all();
});

Route::get('/depts', function () {
    return App\Department::all();
});
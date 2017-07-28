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

Route::get('/api/categories', function () {
    return App\Category::all();
});

Route::get('/api/gettheusers', function () {
    return App\User::select('id','firstname','lastname')->where([ ['id','<>',Auth::id()], ['vacation','=',0] ])->get();
});

Route::get('/api/statuses', function () {
    return App\Status::all();
});

Route::get('/api/depts', function () {
    return App\Department::all();
});
//Route::get('/api/depts', function() { return App\Department::with('users')->with('manager')->get(); } );
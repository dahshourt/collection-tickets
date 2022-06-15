<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

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

Route::get('login', 'Auth\AuthController@index');
Route::post('login', 'Auth\AuthController@Login')->name('login');
Route::get('signout', 'Auth\AuthController@signOut')->name('signout');



Route::group(['middleware' => ['auth']], function () {


    Route::get('/', function () {
        return view('dashboard/index');
    });




    Route::get('users/create_users','User\UserController@create_user')->name('users.create_users');
    Route::post('users/store_users','User\UserController@store_user')->name('users.store_users');
    Route::get('groups/create_group','Groups\GroupController@create_group')->name('groups.create_group');
    Route::get('groups/index','Groups\GroupController@index')->name('groups.index');
    Route::post('groups/store_group','Groups\GroupController@store_group')->name('groups.store_group');
    Route::get('groups/edit/{group}','Groups\GroupController@edit')->name('groups.edit');
    Route::post('groups/update/{group}','Groups\GroupController@update')->name('groups.update');

    Route::get('users/index','User\UserController@index')->name('users.index');
    Route::get('users/edit/{user}','User\UserController@edit')->name('users.edit');
    Route::post('users/update/{user}','User\UserController@update')->name('users.update');

    Route::resource('categories', 'Categories\CategoryController');



    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('report')->group(function () {

        Route::get('/cm-report', [ReportController::class, 'cm_report']);
        Route::get('/entp-report', [ReportController::class, 'entp_report']);
        Route::get('/entrp-report-result', [ReportController::class, 'entrp_report_result']);

        Route::get('/collection-report', [ReportController::class, 'collection_report']);
        Route::get('/cash-report', [ReportController::class, 'cash_report']);
        Route::get('/cash-report-result', [ReportController::class, 'cash_report_result']);

        Route::get('/report-result', [ReportController::class, 'report_result']);
        Route::get('/export-report', [ReportController::class, 'export_report']);

        Route::get('/export-entrp-report', [ReportController::class, 'export_entrp_report']);


    });

    // Route::get('/', [ReportController::class, 'index']);


    Route::group(['prefix' => 'tickets'], function (){
        Route::get('create_ticket', 'Tickets\Tickets_controller@create' )->name('create_ticket');
        Route::post('store_ticket', 'Tickets\Tickets_controller@store' );
        Route::get('show_ticket/{id}', 'Tickets\Tickets_controller@show' );
        Route::post('update_ticket/{id}', 'Tickets\Tickets_controller@update' );
        Route::get('/download_file/{id}', 'Tickets\Tickets_controller@getDownload');
    });
});




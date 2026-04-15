<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('login', 'Auth\AuthController@index');
Route::post('login', 'Auth\AuthController@Login')->name('login');
Route::get('signout', 'Auth\AuthController@signOut')->name('signout');

Route::get('login/ldap', 'Auth\AuthController@indexLdap');
Route::post('login/ldap', 'Auth\AuthController@LoginLdap')->name('login/ldap');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        return view('dashboard/index');
    });

    // TEMP: debug timezone — visit /debug-time while logged in, then remove this route
    Route::get('debug-time', [App\Http\Controllers\AdministrationLogController::class, 'debug_time']);

    Route::group(['middleware' => 'adminpermissions'], function () {
        Route::get('users/create_users', 'User\UserController@create_user')->name('users.create_users');
        Route::post('users/store_users', 'User\UserController@store_user')->name('users.store_users');
        Route::get('groups/create_group', 'Groups\GroupController@create_group')->name('groups.create_group');
        Route::get('groups/index', 'Groups\GroupController@index')->name('groups.index');
        Route::post('groups/store_group', 'Groups\GroupController@store_group')->name('groups.store_group');
        Route::get('groups/edit/{group}', 'Groups\GroupController@edit')->name('groups.edit');
        Route::post('groups/update/{group}', 'Groups\GroupController@update')->name('groups.update');

        Route::get('users/index', 'User\UserController@index')->name('users.index');
        Route::get('users/edit/{user}', 'User\UserController@edit')->name('users.edit');
        Route::post('users/update/{user}', 'User\UserController@update')->name('users.update');
        Route::resource('workflows', 'Workflows\WorkflowController');
    });

    Route::resource('categories', 'Categories\CategoryController');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('report')->group(function () {
        Route::get('/cm-report', [ReportController::class, 'cm_report']);
        Route::get('/entp-report', [ReportController::class, 'entp_report']);
        Route::get('/entrp-report-result', [ReportController::class, 'entrp_report_result']);
        Route::post('/export_entrp_report_result', [ReportController::class, 'export_entrp_report_result']);

        Route::get('/collection-report', [ReportController::class, 'collection_report']);
        Route::get('/cash-report', [ReportController::class, 'cash_report']);
        Route::get('/cash-report-result', [ReportController::class, 'cash_report_result']);

        Route::get('/report-result', [ReportController::class, 'report_result']);
        Route::get('/export-report', [ReportController::class, 'export_report']);

        Route::get('/export-entrp-report', [ReportController::class, 'export_entrp_report']);
    });

    Route::group(['prefix' => 'tickets'], function () {
        Route::get('create_ticket', 'Tickets\Tickets_controller@create')->name('create_ticket');
        Route::get('ticket-logs/{id}', 'Tickets\Tickets_controller@ticket_logs');

        Route::post('store_ticket', 'Tickets\Tickets_controller@store');
        Route::group(['middleware' => 'userpermissions'], function () {
            Route::get('show_ticket/{id}', 'Tickets\Tickets_controller@show');
            Route::post('update_ticket/{id}', 'Tickets\Tickets_controller@update');
        });

        Route::get('/download_file/{id}', 'Tickets\Tickets_controller@getDownload');
        Route::get('/', 'Tickets\Tickets_controller@index');
        Route::post('/bulk/update', 'Tickets\Tickets_controller@BulkUpdate');
        Route::get('myTickets', 'Tickets\Tickets_controller@myTickets');
        Route::get('/export-tickets', 'Tickets\Tickets_controller@export_tickets');
        Route::get('search', 'Tickets\Tickets_controller@index');
    });

    Route::get('transaction/workflow', 'Tickets\Tickets_controller@TransactionWorkflow');
    Route::get('workflow/status/group', 'Tickets\Tickets_controller@WorkflowStatusGroup');

    Route::delete('administration-logs/delete_workflow_logs', [App\Http\Controllers\AdministrationLogController::class, 'delete_workflow_logs'])->name('administration.logs.delete_workflow');
    Route::get('administration-logs/get_logs', [App\Http\Controllers\AdministrationLogController::class, 'get_logs'])->name('administration.logs');
});

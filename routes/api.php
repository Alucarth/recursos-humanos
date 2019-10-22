<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group(['prefix' => 'api','middleware' => 'jwt.auth'], function ($router) {
//     Route::get('/', 'HomeController@index')->name('home');
// });
Route::get('print_demo','ReportController@print_demo');
Route::get('ficha_personal/{id}','ReportController@ficha_personal');
Route::post('login', 'AuthController@login');
Route::group([
            'prefix' => 'auth',
            'middleware' => 'jwt.auth'
        ], function ($router) {

    // Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::resource('employee', 'EmployeeController');
    Route::resource('position', 'PositionController');
    Route::resource('city', 'CityController');
    Route::resource('country', 'CountryController');
    Route::resource('document_type', 'DocumentTypeController');
    Route::resource('contract_type', 'ContractTypeController');
    Route::resource('contract_modality', 'ContractModalityController');
    Route::resource('management', 'ManagementController');
    Route::resource('unity', 'UnitController');
    Route::resource('contribution', 'ContributionController');
    Route::resource('employee_request', 'EmployeeRequestController');
    Route::resource('kinship', 'KinshipController');
    Route::resource('health_box', 'HealthBoxController');
    Route::resource('biometric', 'BiometricController');
    Route::resource('attendance', 'AttendanceController');
    Route::post('sync_biometric','BiometricController@sync');
    Route::get('info_biometric/{biometric_id}','BiometricController@getInfo');
    Route::get('employee_info','EmployeeController@info');
    Route::get('my_request', 'EmployeeRequestController@index_employee');
    Route::get('send_request/{employee_request_id}', 'EmployeeRequestController@send');
    Route::resource('request_type', 'RequestTypeController');
    Route::post('approve_request','EmployeeRequestController@approve');
    Route::post('save_employee','EmployeeController@save_employee' );
    Route::post('enabled_employee','EmployeeController@enabled' );


});

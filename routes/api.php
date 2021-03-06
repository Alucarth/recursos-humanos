<?php

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
Route::get('print_demo', 'ReportController@print_demo');
Route::get('ficha_personal/{id}', 'ReportController@ficha_personal');
Route::get('employee_request_print/{id}', 'ReportController@boleta');
Route::get('attendance_employee/{employee_id}/{from_date}/{to_date}','ReportController@attendance_employee');
Route::get('attendance_employee_date/{employee_id}/{from_date}/{to_date}','ReportController@attendance_employee_date');
Route::get('payroll/{management_id}/{from_date}/{to_date}','ReportExcelController@payroll');
Route::get('roe','ReportExcelController@roe');

//** Revisar  */
Route::get('ReportMonth/{fecha}/{id_user}/{planta}', 'ReportController@ReportMonth');
Route::get('ReportYear/{fecha}/{id_user}/{planta}', 'ReportController@ReportYear');
Route::get('reportMonthExcel/{fecha}/{id_user}/{tipo_doc}/{planta}', 'ReportController@reportMonthExcel');
Route::get('generateCart', 'RefreshmentController@generateCart');
/**  */
Route::post('login', 'AuthController@login');
Route::group([
	'prefix' => 'auth',
	'middleware' => 'jwt.auth',
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
    Route::resource('eventual_schedule', 'EventualScheduleController');

	Route::post('sync_biometric', 'BiometricController@sync');
	Route::get('info_biometric/{biometric_id}', 'BiometricController@getInfo');
	Route::get('employee_info', 'EmployeeController@info');
	Route::get('my_request', 'EmployeeRequestController@index_employee');
	Route::get('send_request/{employee_request_id}', 'EmployeeRequestController@send');
	Route::resource('request_type', 'RequestTypeController');
	Route::post('approve_request', 'EmployeeRequestController@approve');
	Route::post('save_employee', 'EmployeeController@save_employee');
	Route::post('enabled_employee', 'EmployeeController@enabled');
	Route::post('request_upload_image', 'EmployeeRequestController@upload_image');
	Route::get('archive_request/{employee_request_id}', 'EmployeeRequestController@archived');
	Route::get('archives', 'EmployeeRequestController@index_archived');
	Route::get('user_check', 'EmployeeController@check');
	Route::resource('refreshment', 'RefreshmentController');
	Route::post('generarPlanillaMensual/{fecha}', 'RefreshmentController@generarPlanillaMensual');
	Route::get('listEmploye/{fecha}/{plnata}', 'RefreshmentController@listEmploye');
	Route::get('lstRefresment/{fecha}/{planta}', 'RefreshmentController@lstRefresment');
	Route::get('lstLocations', 'RefreshmentController@lstLocations');

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
    Route::resource('type_hour', 'TypeHourController');
    Route::resource('location', 'LocationController');
    Route::resource('holyday', 'HolydayController');
    Route::post('sync_biometric','BiometricController@sync');
    Route::post('assign_type_hour','EmployeeController@assign_type_hour');
    Route::get('info_biometric/{biometric_id}','BiometricController@getInfo');
    Route::get('employee_info','EmployeeController@info');
    Route::get('my_request', 'EmployeeRequestController@index_employee');
    Route::get('send_request/{employee_request_id}', 'EmployeeRequestController@send');
    Route::resource('request_type', 'RequestTypeController');
    Route::post('approve_request','EmployeeRequestController@approve');
    Route::post('save_employee','EmployeeController@save_employee' );
    Route::post('enabled_employee','EmployeeController@enabled' );
    Route::post('request_upload_image','EmployeeRequestController@upload_image');
    Route::get('archive_request/{employee_request_id}','EmployeeRequestController@archived');
    Route::get('archives','EmployeeRequestController@index_archived');
    Route::get('user_check','EmployeeController@check');

    Route::get('employees_management/{management_id}','ManagementController@employees');
    Route::get('dashboard','EmployeeController@dashboard');

    Route::resource('category','CategoryController');
    Route::resource('salary','SalaryScaleController');
    Route::resource('user','UserController');
    Route::get('roles','UserController@roles');
    Route::resource('academic_training','AcademicTrainingController');
});

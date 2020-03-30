<?php




/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
	$as = config('laraadmin.adminRoute').'.';
	
	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	
	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
	
	/* ================== Student ================== */
	Route::resource(config('laraadmin.adminRoute') . '/student', 'LA\StudentController');
	Route::get(config('laraadmin.adminRoute') . '/student_dt_ajax', 'LA\StudentController@dtajax');

	/* ================== Employee ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employee', 'LA\EmployeeController');
	Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeeController@dtajax');


	/* ================== Uploads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
	Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
	Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
	Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');
	
	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');
	
	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');
	
	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');
	
	/* ================== Employees ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
	Route::get(config('laraadmin.adminRoute') . '/employees_dt_ajax', 'LA\EmployeesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\EmployeesController@change_password');
	
	/* ================== Organizations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/organizations', 'LA\OrganizationsController');
	Route::get(config('laraadmin.adminRoute') . '/organization_dt_ajax', 'LA\OrganizationsController@dtajax');

	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');

	/* ================== CMS_Pages ================== */
	Route::resource(config('laraadmin.adminRoute') . '/cms_pages', 'LA\CMS_PagesController');
	Route::get(config('laraadmin.adminRoute') . '/cms_page_dt_ajax', 'LA\CMS_PagesController@dtajax');


	/* ================== Manage_Course_Materials ================== */
	Route::resource(config('laraadmin.adminRoute') . '/manage_course_materials', 'LA\Manage_Course_MaterialsController');
	Route::get(config('laraadmin.adminRoute') . '/manage_course_material_dt_ajax', 'LA\Manage_Course_MaterialsController@dtajax');


	/* ================== Upcoming_Master_Classes ================== */
	Route::resource(config('laraadmin.adminRoute') . '/upcoming_master_classes', 'LA\Upcoming_Master_ClassesController');
	Route::get(config('laraadmin.adminRoute') . '/upcoming_master_class_dt_ajax', 'LA\Upcoming_Master_ClassesController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/upcoming_master_classes/getcoursedetails/{courseid}', 'LA\Upcoming_Master_ClassesController@getcoursedetails');
	

	/* ================== CMS_Pages ================== */
	Route::resource(config('laraadmin.adminRoute') . '/cms_pages', 'LA\CMS_PagesController');
	Route::get(config('laraadmin.adminRoute') . '/cms_page_dt_ajax', 'LA\CMS_PagesController@dtajax');

	/* ================== Community_of_Practices ================== */
	Route::resource(config('laraadmin.adminRoute') . '/community_of_practices', 'LA\Community_of_PracticesController');
	Route::get(config('laraadmin.adminRoute') . '/community_of_practice_dt_ajax', 'LA\Community_of_PracticesController@dtajax');

	/* ================== Community_of_Practices ================== */
	Route::resource(config('laraadmin.adminRoute') . '/community_of_practices', 'LA\Community_of_PracticesController');
	Route::get(config('laraadmin.adminRoute') . '/community_of_practice_dt_ajax', 'LA\Community_of_PracticesController@dtajax');

	/* ================== Course_Details ================== */
	Route::resource(config('laraadmin.adminRoute') . '/course_details', 'LA\Course_DetailsController');
	Route::get(config('laraadmin.adminRoute') . '/course_detail_dt_ajax', 'LA\Course_DetailsController@dtajax');

	/* ================== Assign_Course_Materials ================== */
	Route::resource(config('laraadmin.adminRoute') . '/assign_course_materials', 'LA\Assign_Course_MaterialsController');
	Route::get(config('laraadmin.adminRoute') . '/assign_course_material_dt_ajax', 'LA\Assign_Course_MaterialsController@dtajax');

	/* ================== Course_Programs ================== */
	Route::resource(config('laraadmin.adminRoute') . '/course_programs', 'LA\Course_ProgramsController');
	Route::get(config('laraadmin.adminRoute') . '/course_program_dt_ajax', 'LA\Course_ProgramsController@dtajax');

	/* ================== Tests ================== */
	Route::resource(config('laraadmin.adminRoute') . '/tests', 'LA\TestsController');
	Route::get(config('laraadmin.adminRoute') . '/test_dt_ajax', 'LA\TestsController@dtajax');

	/* ================== Demos ================== */
	Route::resource(config('laraadmin.adminRoute') . '/demos', 'LA\DemosController');
	Route::get(config('laraadmin.adminRoute') . '/demo_dt_ajax', 'LA\DemosController@dtajax');
});

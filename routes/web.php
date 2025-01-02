<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TemplateController;


Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

route::get('/home',[TemplateController::class,'index']);


Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Salary
    Route::delete('salaries/destroy', 'SalaryController@massDestroy')->name('salaries.massDestroy');
    Route::resource('salaries', 'SalaryController');

    // Job Type
    Route::delete('job-types/destroy', 'JobTypeController@massDestroy')->name('job-types.massDestroy');
    Route::resource('job-types', 'JobTypeController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // City
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Industry
    Route::delete('industries/destroy', 'IndustryController@massDestroy')->name('industries.massDestroy');
    Route::resource('industries', 'IndustryController');

    // Company
    Route::delete('companies/destroy', 'CompanyController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompanyController@storeMedia')->name('companies.storeMedia');
    Route::post('companies/ckmedia', 'CompanyController@storeCKEditorImages')->name('companies.storeCKEditorImages');
    Route::resource('companies', 'CompanyController');

    // Transaction
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    // Chats
    Route::delete('chats/destroy', 'ChatsController@massDestroy')->name('chats.massDestroy');
    Route::resource('chats', 'ChatsController');

    // Notification
    Route::delete('notifications/destroy', 'NotificationController@massDestroy')->name('notifications.massDestroy');
    Route::resource('notifications', 'NotificationController');

    // Nationality
    Route::delete('nationalities/destroy', 'NationalityController@massDestroy')->name('nationalities.massDestroy');
    Route::resource('nationalities', 'NationalityController');

    // Cv
    Route::delete('cvs/destroy', 'CvController@massDestroy')->name('cvs.massDestroy');
    Route::post('cvs/media', 'CvController@storeMedia')->name('cvs.storeMedia');
    Route::post('cvs/ckmedia', 'CvController@storeCKEditorImages')->name('cvs.storeCKEditorImages');
    Route::resource('cvs', 'CvController');

    // Job
    Route::delete('jobs/destroy', 'JobController@massDestroy')->name('jobs.massDestroy');
    Route::resource('jobs', 'JobController');

    // Skils
    Route::delete('skils/destroy', 'SkilsController@massDestroy')->name('skils.massDestroy');
    Route::resource('skils', 'SkilsController');

    // Applicatnt
    Route::delete('applicatnts/destroy', 'ApplicatntController@massDestroy')->name('applicatnts.massDestroy');
    Route::post('applicatnts/media', 'ApplicatntController@storeMedia')->name('applicatnts.storeMedia');
    Route::post('applicatnts/ckmedia', 'ApplicatntController@storeCKEditorImages')->name('applicatnts.storeCKEditorImages');
    Route::resource('applicatnts', 'ApplicatntController');

    // Review
    Route::delete('reviews/destroy', 'ReviewController@massDestroy')->name('reviews.massDestroy');
    Route::resource('reviews', 'ReviewController');

    // Application
    Route::delete('applications/destroy', 'ApplicationController@massDestroy')->name('applications.massDestroy');
    Route::resource('applications', 'ApplicationController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

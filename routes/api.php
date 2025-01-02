<?php
// use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Session;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Salary
    Route::apiResource('salaries', 'SalaryApiController');

    // Job Type
    Route::apiResource('job-types', 'JobTypeApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // City
    Route::apiResource('cities', 'CityApiController');

    // Industry
    Route::apiResource('industries', 'IndustryApiController');

    // Company
    Route::post('companies/media', 'CompanyApiController@storeMedia')->name('companies.storeMedia');
    Route::apiResource('companies', 'CompanyApiController');

    // Transaction
    Route::apiResource('transactions', 'TransactionApiController');

    // Payment
    Route::apiResource('payments', 'PaymentApiController');

    // Chats
    Route::apiResource('chats', 'ChatsApiController');

    // Notification
    Route::apiResource('notifications', 'NotificationApiController');

    // Nationality
    Route::apiResource('nationalities', 'NationalityApiController');

    // Cv
    Route::post('cvs/media', 'CvApiController@storeMedia')->name('cvs.storeMedia');
    Route::apiResource('cvs', 'CvApiController');

    // Job
    Route::apiResource('jobs', 'JobApiController');

    // Skils
    Route::apiResource('skils', 'SkilsApiController');

    // Applicatnt
    Route::post('applicatnts/media', 'ApplicatntApiController@storeMedia')->name('applicatnts.storeMedia');
    Route::apiResource('applicatnts', 'ApplicatntApiController');

    // Review
    Route::apiResource('reviews', 'ReviewApiController');

    // Application
    Route::apiResource('applications', 'ApplicationApiController');
});

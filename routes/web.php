<?php

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

Route::get('/roles', 'Admin\RoleController@index')->name('adminRoles');
Route::get('/roles/{id}/edit', 'Admin\RoleController@edit')->name('adminRolesEdit');
Route::put('/roles/{id}', 'Admin\RoleController@update')->name('adminRolesUpdate');
Route::get('/roles/create', 'Admin\RoleController@create')->name('adminRolesCreate');
Route::post('/roles', 'Admin\RoleController@store')->name('adminRolesStore');
Route::get('/roles/{id}/delete', 'Admin\RoleController@destroy')->name('adminRolesDelete');

Route::get('/countries', 'Admin\CountryController@index')->name('adminCountries');
Route::get('/countries/create', 'Admin\CountryController@create')->name('adminCountriesCreate');
Route::post('/countries', 'Admin\CountryController@store')->name('adminCountriesStore');
Route::get('/countries/{id}/edit', 'Admin\CountryController@edit')->name('adminCountriesEdit');
Route::put('/countries/{id}', 'Admin\CountryController@update')->name('adminCountriesUpdate');
Route::get('/countries/{id}/delete', 'Admin\CountryController@destroy')->name('adminCountriesDelete');

Route::get('/cities', 'Admin\CityController@index')->name('adminCities');
Route::get('/cities/create', 'Admin\CityController@create')->name('adminCitiesCreate');
Route::post('/cities', 'Admin\CityController@store')->name('adminCitiesStore');
Route::get('/cities/{id}/edit', 'Admin\CityController@edit')->name('adminCitiesEdit');
Route::put('/cities/{id}', 'Admin\CityController@update')->name('adminCitiesUpdate');
Route::get('/cities/{id}/delete', 'Admin\CityController@destroy')->name('adminCitiesDelete');

Route::get('/wards', 'Admin\WardController@index')->name('adminWards');
Route::get('/wards/create', 'Admin\WardController@create')->name('adminWardsCreate');
Route::post('/wards', 'Admin\WardController@store')->name('adminWardsStore');
Route::get('/wards/{id}/edit', 'Admin\WardController@edit')->name('adminWardsEdit');
Route::put('/wards/{id}', 'Admin\WardController@update')->name('adminWardsUpdate');
Route::get('/wards/{id}/delete', 'Admin\WardController@destroy')->name('adminWardsDelete');

Route::get('/schools', 'Admin\SchoolController@index')->name('adminSchools');
Route::get('/schools/create', 'Admin\SchoolController@create')->name('adminSchoolsCreate');
Route::post('/schools', 'Admin\SchoolController@store')->name('adminSchoolsStore');
Route::get('/schools/{id}/edit', 'Admin\SchoolController@edit')->name('adminSchoolsEdit');
Route::put('/schools/{id}', 'Admin\SchoolController@update')->name('adminSchoolsUpdate');
Route::get('/schools/{id}/delete', 'Admin\SchoolController@destroy')->name('adminSchoolsDelete');

/*Route::get('/ajaxSelectCountry', 'Admin\CountryController@select');
Route::get('/ajaxSelectCity', 'Admin\CityController@selectCity');*/

Route::get('/ajaxCity', 'Admin\CityController@select');
Route::get('/ajaxWard', 'Admin\WardController@select');



// Route::get('/form', 'CountryController@showForm');
// Route::post('/showCitiesInCountry', 'CityController@showCitiesInCountry');
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
Route::get('profile', 'Admin\UserController@profile')->name('profile');
Route::post('profile', 'Admin\UserController@update_avatar');
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

Route::get('/areas', 'Admin\AreaController@index')->name('adminAreas');
Route::get('/areas/create', 'Admin\AreaController@create')->name('adminAreasCreate');
Route::post('/areas', 'Admin\AreaController@store')->name('adminAreasStore');
Route::get('/areas/{id}/edit', 'Admin\AreaController@edit')->name('adminAreasEdit');
Route::put('/areas/{id}', 'Admin\AreaController@update')->name('adminAreasUpdate');
Route::get('/areas/{id}/delete', 'Admin\AreaController@destroy')->name('adminAreasDelete');

Route::get('/branches', 'Admin\BranchController@index')->name('adminBranches');
Route::get('/branches/create', 'Admin\BranchController@create')->name('adminBranchesCreate');
Route::post('/branches', 'Admin\BranchController@store')->name('adminBranchesStore');
Route::get('/branches/{id}/edit', 'Admin\BranchController@edit')->name('adminBranchesEdit');
Route::put('/branches/{id}', 'Admin\BranchController@update')->name('adminBranchesUpdate');
Route::get('/branches/{id}/delete', 'Admin\BranchController@destroy')->name('adminBranchesDelete');


Route::get('/specializeds', 'Admin\SpecializedController@index')->name('adminSpecializeds');
Route::get('/specializeds/create', 'Admin\SpecializedController@create')->name('adminSpecializedsCreate');
Route::post('/specializeds', 'Admin\SpecializedController@store')->name('adminSpecializedsStore');
Route::get('/specializeds/{id}/edit', 'Admin\SpecializedController@edit')->name('adminSpecializedsEdit');
Route::put('/specializeds/{id}', 'Admin\SpecializedController@update')->name('adminSpecializedsUpdate');
Route::get('/specializeds/{id}/delete', 'Admin\SpecializedController@destroy')->name('adminSpecializedsDelete');

Route::get('/sets', 'Admin\SetController@index')->name('adminSets');
Route::get('/sets/create', 'Admin\SetController@create')->name('adminSetsCreate');
Route::post('/sets', 'Admin\SetController@store')->name('adminSetsStore');
Route::get('/sets/{id}/edit', 'Admin\SetController@edit')->name('adminSetsEdit');
Route::put('/sets/{id}', 'Admin\SetController@update')->name('adminSetsUpdate');
Route::get('/sets/{id}/delete', 'Admin\SetController@destroy')->name('adminSetsDelete');

Route::get('/subjects', 'Admin\SubjectController@index')->name('adminSubjects');
Route::get('/subjects/create', 'Admin\SubjectController@create')->name('adminSubjectsCreate');
Route::post('/subjects', 'Admin\SubjectController@store')->name('adminSubjectsStore');
Route::get('/subjects/{id}/edit', 'Admin\SubjectController@edit')->name('adminSubjectsEdit');
Route::put('/subjects/{id}', 'Admin\SubjectController@update')->name('adminSubjectsUpdate');
Route::get('/subjects/{id}/delete', 'Admin\SubjectController@destroy')->name('adminSubjectsDelete');

Route::get('/applies', 'Admin\ApplyController@index')->name('adminApplies');
Route::get('/applies/create', 'Admin\ApplyController@create')->name('adminAppliesCreate');
Route::post('/applies', 'Admin\ApplyController@store')->name('adminAppliesStore');
Route::get('/applies/{id}/edit', 'Admin\ApplyController@edit')->name('adminAppliesEdit');
Route::put('/applies/{id}', 'Admin\ApplyController@update')->name('adminAppliesUpdate');
Route::get('/applies/{id}/delete', 'Admin\ApplyController@destroy')->name('adminAppliesDelete');

Route::get('/candidateTypes', 'Admin\CandidateTypeController@index')->name('adminCandidateTypes');
Route::get('/candidateTypes/create', 'Admin\CandidateTypeController@create')->name('adminCandidateTypesCreate');
Route::post('/candidateTypes', 'Admin\CandidateTypeController@store')->name('adminCandidateTypesStore');
Route::get('/candidateTypes/{id}/edit', 'Admin\CandidateTypeController@edit')->name('adminCandidateTypesEdit');
Route::put('/candidateTypes/{id}', 'Admin\CandidateTypeController@update')->name('adminCandidateTypesUpdate');
Route::get('/candidateTypes/{id}/delete', 'Admin\CandidateTypeController@destroy')->name('adminCandidateTypesDelete');

Route::get('/candidates', 'Admin\CandidateController@index')->name('adminCandidates');
Route::get('/candidates/{id}/show', 'Admin\CandidateController@show')->name('adminCandidatesShow');
Route::get('/candidates/create', 'Admin\CandidateController@create')->name('adminCandidatesCreate');
Route::post('/candidates', 'Admin\CandidateController@store')->name('adminCandidatesStore');
Route::get('/candidates/{id}/edit', 'Admin\CandidateController@edit')->name('adminCandidatesEdit');
Route::put('/candidates/{id}', 'Admin\CandidateController@update')->name('adminCandidatesUpdate');
Route::get('/candidates/{id}/delete', 'Admin\CandidateController@destroy')->name('adminCandidatesDelete');

Route::get('/ajaxCity', 'Admin\CityController@select');
Route::get('/ajaxWard', 'Admin\WardController@select');
Route::get('/ajaxSet', 'Admin\SetController@select');
/*Route::get('/ajaxSchool', 'Admin\SchoolController@select');*/


Route::get('/form', 'CountryController@showForm');
Route::post('/showCitiesInCountry', 'CityController@showCitiesInCountry');
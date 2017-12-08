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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/candidates/create', 'CandidateController@create')->name('candidatesCreate');
Route::post('/candidates', 'CandidateController@store')->name('candidatesStore');
Route::get('/candidates/branches', 'CandidateController@branches')->name('candidates.branches');
Route::get('/candidates/subjects', 'CandidateController@subjects')->name('candidates.subjects');
Route::get('/upload', 'CandidateController@uploadForm');
Route::post('/upload', 'CandidateController@uploadSubmit');


$admin_config = [
    "prefix"     => "admin",
    "namespace"  => "Admin",
    "as"         => "admin.",
    "middleware" => "admin",
];

Route::group($admin_config, function () {
	Route::get('/', 'AdminController@index')->name('index');
	Route::get('profile', 'UserController@profile')->name('profile');
	Route::post('profile', 'UserController@update_avatar');

	Route::get('users', 'UserController@index')->name('users.index');
	Route::resource("roles", "RoleController");

	Route::get('/categories', 'CategoryController@index')->name('categories.index');
	Route::post('/categories', 'CategoryController@store')->name('categories.store');
	Route::get('/categories/{id}/delete', 'CategoryController@destroy')->name('categories.destroy');

	Route::resource("tags", "TagController");

	Route::resource('posts', 'PostController');


	Route::get('/countries', 'CountryController@index')->name('countries.index');
	Route::get('/countries/create', 'CountryController@create')->name('countries.create');
	Route::post('/countries', 'CountryController@store')->name('countries.store');
	Route::get('/countries/{id}/edit', 'CountryController@edit')->name('countries.edit');
	Route::put('/countries/{id}', 'CountryController@update')->name('countries.update');
	Route::get('/countries/{id}/delete', 'CountryController@destroy')->name('countries.destroy');

	Route::get('/cities', 'CityController@index')->name('cities.index');
	Route::get('/cities/create', 'CityController@create')->name('cities.create');
	Route::post('/cities', 'CityController@store')->name('cities.store');
	Route::get('/cities/{id}/edit', 'CityController@edit')->name('cities.edit');
	Route::put('/cities/{id}', 'CityController@update')->name('cities.update');
	Route::get('/cities/{id}/delete', 'CityController@destroy')->name('cities.destroy');

	Route::get('/schools', 'SchoolController@index')->name('schools.index');
	Route::get('/schools/create', 'SchoolController@create')->name('schools.create');
	Route::post('/schools', 'SchoolController@store')->name('schools.store');
	Route::get('/schools/{id}/edit', 'SchoolController@edit')->name('schools.edit');
	Route::put('/schools/{id}', 'SchoolController@update')->name('schools.update');
	Route::get('/schools/{id}/delete', 'SchoolController@destroy')->name('schools.destroy');

	Route::get('/areas', 'AreaController@index')->name('areas.index');
	Route::get('/areas/create', 'AreaController@create')->name('areas.create');
	Route::post('/areas', 'AreaController@store')->name('areas.store');
	Route::get('/areas/{id}/edit', 'AreaController@edit')->name('areas.edit');
	Route::put('/areas/{id}', 'AreaController@update')->name('areas.update');
	Route::get('/areas/{id}/delete', 'AreaController@destroy')->name('areas.destroy');

	Route::get('/branches', 'BranchController@index')->name('branches.index');
	Route::get('/branches/create', 'BranchController@create')->name('branches.create');
	Route::post('/branches', 'BranchController@store')->name('branches.store');
	Route::get('/branches/{id}/edit', 'BranchController@edit')->name('branches.edit');
	Route::put('/branches/{id}', 'BranchController@update')->name('branches.update');
	Route::get('/branches/{id}/delete', 'BranchController@destroy')->name('branches.destroy');


	Route::get('/specializeds', 'SpecializedController@index')->name('specializeds.index');
	Route::get('/specializeds/create', 'SpecializedController@create')->name('specializeds.create');
	Route::post('/specializeds', 'SpecializedController@store')->name('specializeds.store');
	Route::get('/specializeds/{id}/edit', 'SpecializedController@edit')->name('specializeds.edit');
	Route::put('/specializeds/{id}', 'SpecializedController@update')->name('specializeds.update');
	Route::get('/specializeds/{id}/delete', 'SpecializedController@destroy')->name('specializeds.destroy');

	Route::get('/sets', 'SetController@index')->name('sets.index');
	Route::get('/sets/create', 'SetController@create')->name('sets.create');
	Route::post('/sets', 'SetController@store')->name('sets.store');
	Route::get('/sets/{id}/edit', 'SetController@edit')->name('sets.edit');
	Route::put('/sets/{id}', 'SetController@update')->name('sets.update');
	Route::get('/sets/{id}/delete', 'SetController@destroy')->name('sets.destroy');

	Route::get('/subjects', 'SubjectController@index')->name('subjects.index');
	Route::get('/subjects/create', 'SubjectController@create')->name('subjects.create');
	Route::post('/subjects', 'SubjectController@store')->name('subjects.store');
	Route::get('/subjects/{id}/edit', 'SubjectController@edit')->name('subjects.edit');
	Route::put('/subjects/{id}', 'SubjectController@update')->name('subjects.update');
	Route::get('/subjects/{id}/delete', 'SubjectController@destroy')->name('subjects.destroy');

	Route::get('/applies', 'ApplyController@index')->name('applies.index');
	Route::get('/applies/create', 'ApplyController@create')->name('applies.create');
	Route::post('/applies', 'ApplyController@store')->name('applies.store');
	Route::get('/applies/{id}/edit', 'ApplyController@edit')->name('applies.edit');
	Route::put('/applies/{id}', 'ApplyController@update')->name('applies.update');
	Route::get('/applies/{id}/delete', 'ApplyController@destroy')->name('applies.destroy');

	Route::get('/candidateTypes', 'CandidateTypeController@index')->name('candidateTypes.index');
	Route::get('/candidateTypes/create', 'CandidateTypeController@create')->name('candidateTypes.create');
	Route::post('/candidateTypes', 'CandidateTypeController@store')->name('candidateTypes.store');
	Route::get('/candidateTypes/{id}/edit', 'CandidateTypeController@edit')->name('candidateTypes.edit');
	Route::put('/candidateTypes/{id}', 'CandidateTypeController@update')->name('candidateTypes.update');
	Route::get('/candidateTypes/{id}/delete', 'CandidateTypeController@destroy')->name('candidateTypes.destroy');

	Route::get('/candidates', 'CandidateController@index')->name('candidates.index');
	Route::get('/candidates/confirmed', 'CandidateController@showConfirm')->name('candidates.showConfirmed');
	Route::get('/candidates/unconfirmed', 'CandidateController@showUnconfirm')->name('candidates.showUnconfirmed');
	Route::get('/candidates/{id}/show', 'CandidateController@show')->name('candidates.show');
	Route::get('/candidates/create', 'CandidateController@create')->name('candidates.create');
	Route::post('/candidates', 'CandidateController@store')->name('candidates.store');
	Route::get('/candidates/{id}/edit', 'CandidateController@edit')->name('candidates.edit');
	Route::put('/candidates/{id}', 'CandidateController@update')->name('candidates.update');
	Route::get('/candidates/{id}/delete', 'CandidateController@destroy')->name('candidates.destroy');
	Route::get('/candidates/{id}', 'CandidateController@getPDF')->name('candidates.getPDF');
	Route::post('/active', 'CandidateController@active')->name('candidates.active');


});
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

Route::get('/ajaxCity', 'CityController@select');
Route::get('/ajaxSchool', 'SchoolController@select');
Route::get('/ajaxSpecialized', 'CandidateController@select');

/*Route::get('/ajaxSchool', 'Admin\SchoolController@select');*/


Route::get('/form', 'CountryController@showForm');
Route::post('/showCitiesInCountry', 'CityController@showCitiesInCountry');
<?php

use Illuminate\Support\Facades\Route;

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
Route::get('admin/logout', function () {
    Request::session()->forget('auth');
     return redirect('admin/login');
   
});


/**** pour employer ****/
Route::get('admin/login','admin\employerController@login');
Route::post('admin/login','admin\employerController@dashbord');
Route::get('admin/add_employer','admin\employerController@add_employer');
Route::post('admin/add_employer','admin\employerController@create_employer');
Route::get('admin/tables_employer','admin\employerController@table_employer');
Route::get('admin/cherche_employer','admin\employerController@cherche_employer');
Route::get('admin/employer_profile','admin\employerController@employer_profile');
Route::post('admin/employer_profile','admin\employerController@update_employer');

//Route::get('admin/maj_employer','admin\employerController@maj_employer');
//Route::post('admin/maj_employer','admin\employerController@update_employer');
Route::get('admin/statistique_employer','admin\employerController@employer_statistique');

/**pour équipe ****/
Route::get('admin/add_equipe','admin\equipeController@add_equipe');
Route::post('admin/add_equipe','admin\equipeController@create_equipe');
Route::get('admin/tables_equipe','admin\equipeController@table_equipe');
Route::get('admin/equipe_profile','admin\equipeController@equipe_profile');
Route::get('admin/statistique_equipe','admin\equipeController@equipe_statistique');
Route::get('admin/equipe_profile','admin\equipeController@equipe_profile');
/**  pour projet  */
Route::get('admin/add_projet','admin\projetController@add_projet');
Route::post('admin/add_projet','admin\projetController@create_projet');
Route::get('admin/tables_projet','admin\projetController@table_projet');
Route::post('admin/tables_projet','admin\projetController@cherche_projet');
Route::get('admin/project_profile','admin\projetController@project_profile');
Route::get('admin/cherche_projet','admin\projetController@cherche_projet');
//Route::post('admin/project_profile','admin\projetController@update_projet');
// Route::get('admin/maj_projet','admin\projetController@maj_projet');
// Route::post('admin/maj_projet','admin\projetController@update_projet');
Route::get('admin/statistique','admin\projetController@statistique');
Route::get('admin/statistique2','admin\projetController@statistique1');
Route::get('admin/statistique3','admin\projetController@statistique2');

/** pour la tache **/
Route::get('admin/add_tache','admin\tacheController@add_tache');
Route::post('admin/add_tache','admin\tacheController@create_tache');
Route::get('admin/tables_tache','admin\tacheController@table_tache');
Route::get('admin/tache_profile','admin\tacheController@tache_profile');
Route::post('admin/tache_profile','admin\tacheController@update_tache');
Route::get('admin/statistique_tache','admin\tacheController@tache_statistique');

/*** pour table des resource  */
Route::get('admin/add_resource','admin\resourceController@add_resource');
Route::post('admin/add_resource','admin\resourceController@create_resource');
Route::get('admin/tables_resource','admin\resourceController@table_resource');
Route::get('admin/project_tache','admin\resourceController@tache_resource');
Route::get('admin/statistique_resource','admin\resourceController@resource_statistique');

// Route::resource('admin/test','admin\employerController');
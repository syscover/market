<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can any all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['middleware' => ['auth.pulsar','permission.pulsar']], function() {

    /*
    |--------------------------------------------------------------------------
    | FAMILY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/family/{offset?}',                          ['as'=>'OctopusFamily',                   'uses'=>'Syscover\Octopus\Controllers\Families@index',                      'resource' => 'octopus-family',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/family/json/data',                          ['as'=>'jsonDataOctopusFamily',           'uses'=>'Syscover\Octopus\Controllers\Families@jsonData',                   'resource' => 'octopus-family',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/family/create/{offset}',                    ['as'=>'createOctopusFamily',             'uses'=>'Syscover\Octopus\Controllers\Families@createRecord',               'resource' => 'octopus-family',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/family/store/{offset}',                    ['as'=>'storeOctopusFamily',              'uses'=>'Syscover\Octopus\Controllers\Families@storeRecord',                'resource' => 'octopus-family',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/family/{id}/edit/{offset}',                 ['as'=>'editOctopusFamily',               'uses'=>'Syscover\Octopus\Controllers\Families@editRecord',                 'resource' => 'octopus-family',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/family/update/{id}/{offset}',               ['as'=>'updateOctopusFamily',             'uses'=>'Syscover\Octopus\Controllers\Families@updateRecord',               'resource' => 'octopus-family',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/family/delete/{id}/{offset}',               ['as'=>'deleteOctopusFamily',             'uses'=>'Syscover\Octopus\Controllers\Families@deleteRecord',               'resource' => 'octopus-family',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/family/delete/select/records',           ['as'=>'deleteSelectOctopusFamily',       'uses'=>'Syscover\Octopus\Controllers\Families@deleteRecordsSelect',        'resource' => 'octopus-family',        'action' => 'delete']);

});
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

Route::group([

    'middleware' => 'api'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signin', 'AuthController@signin');
    Route::post('update', 'AuthController@update');
    Route::post('project', 'AuthController@project');
    Route::post('project/{id}', 'AuthController@project');
    Route::get('project/{id}', 'AuthController@getProject');
    Route::get('project/{id}/members', 'AuthController@getProjectMembers');
    Route::get('project/{id}/member/{personid}/delete', 'AuthController@deleteMember');
    Route::get('project/{id}/member/{personid}/add', 'AuthController@addMember');
    Route::get('project/{id}/tags', 'AuthController@getProjectTags');
    Route::get('project/{id}/activities', 'AuthController@getProjectActivities');
    Route::get('projects', 'AuthController@projects');
    Route::get('users', 'AuthController@users');
    Route::get('user/{id}', 'AuthController@user');
    Route::get('roles', 'AuthController@roles');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('project-delete/{id}', 'AuthController@deleteProject');
    Route::get('user-delete/{id}', 'AuthController@deleteUser');
    Route::get('tag-delete/{id}', 'AuthController@deleteTag');
    Route::get('tags', 'AuthController@getTags');
    Route::get('tags/{idtag}', 'AuthController@getTags');
    Route::post('tag', 'AuthController@tag');
    Route::get('employees', 'AuthController@getEmployees');    
    Route::post('activity', 'AuthController@activity');
    Route::get('activity/{idactivity}/state/{state}', 'AuthController@updateActivityState');
    Route::get('activity/{idactivity}', 'AuthController@getActivity');
    Route::get('activity/{idactivity}/delete', 'AuthController@deleteActivity');
    Route::get('test', 'AuthController@test');    
});

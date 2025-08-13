<?php

use Illuminate\Support\Str;
use OG\OGCRUD\Events\Routing;
use OG\OGCRUD\Events\RoutingAdmin;
use OG\OGCRUD\Events\RoutingAdminAfter;
use OG\OGCRUD\Events\RoutingAfter;
use OG\OGCRUD\Facades\OGCRUD;

/*
|--------------------------------------------------------------------------
| OGCRUD Routes
|--------------------------------------------------------------------------
|
| This file is where you may override any of the routes that are included
| with OGCRUD.
|
*/

Route::group(['as' => 'ogcrud.'], function () {
    event(new Routing());

    $namespacePrefix = '\\'.config('ogcrud.controllers.namespace').'\\';

    Route::get('login', ['uses' => $namespacePrefix.'OGCRUDAuthController@login',     'as' => 'login']);
    Route::post('login', ['uses' => $namespacePrefix.'OGCRUDAuthController@postLogin', 'as' => 'postlogin']);

    Route::group(['middleware' => 'admin.user'], function () use ($namespacePrefix) {
        event(new RoutingAdmin());

        // Main Admin and Logout Route
        Route::get('/', ['uses' => $namespacePrefix.'OGCRUDController@index',   'as' => 'dashboard']);
        Route::post('logout', ['uses' => $namespacePrefix.'OGCRUDController@logout',  'as' => 'logout']);
        Route::post('upload', ['uses' => $namespacePrefix.'OGCRUDController@upload',  'as' => 'upload']);

        Route::get('profile', ['uses' => $namespacePrefix.'OGCRUDUserController@profile', 'as' => 'profile']);

        try {
            foreach (OGCRUD::model('DataType')::all() as $dataType) {
                $breadController = $dataType->controller
                                 ? Str::start($dataType->controller, '\\')
                                 : $namespacePrefix.'OGCRUDBaseController';

                Route::get($dataType->slug.'/order', $breadController.'@order')->name($dataType->slug.'.order');
                Route::post($dataType->slug.'/action', $breadController.'@action')->name($dataType->slug.'.action');
                Route::post($dataType->slug.'/order', $breadController.'@update_order')->name($dataType->slug.'.update_order');
                Route::get($dataType->slug.'/{id}/restore', $breadController.'@restore')->name($dataType->slug.'.restore');
                Route::get($dataType->slug.'/relation', $breadController.'@relation')->name($dataType->slug.'.relation');
                Route::post($dataType->slug.'/remove', $breadController.'@remove_media')->name($dataType->slug.'.media.remove');
                Route::resource($dataType->slug, $breadController, ['parameters' => [$dataType->slug => 'id']]);
            }
        } catch (\InvalidArgumentException $e) {
            throw new \InvalidArgumentException("Custom routes hasn't been configured because: ".$e->getMessage(), 1);
        } catch (\Exception $e) {
            // do nothing, might just be because table not yet migrated.
        }

        // Menu Routes
        Route::group([
            'as'     => 'menus.',
            'prefix' => 'menus/{menu}',
        ], function () use ($namespacePrefix) {
            Route::get('builder', ['uses' => $namespacePrefix.'OGCRUDMenuController@builder',    'as' => 'builder']);
            Route::post('order', ['uses' => $namespacePrefix.'OGCRUDMenuController@order_item', 'as' => 'order_item']);

            Route::group([
                'as'     => 'item.',
                'prefix' => 'item',
            ], function () use ($namespacePrefix) {
                Route::delete('{id}', ['uses' => $namespacePrefix.'OGCRUDMenuController@delete_menu', 'as' => 'destroy']);
                Route::post('/', ['uses' => $namespacePrefix.'OGCRUDMenuController@add_item',    'as' => 'add']);
                Route::put('/', ['uses' => $namespacePrefix.'OGCRUDMenuController@update_item', 'as' => 'update']);
            });
        });

        // Settings
        Route::group([
            'as'     => 'settings.',
            'prefix' => 'settings',
        ], function () use ($namespacePrefix) {
            Route::get('/', ['uses' => $namespacePrefix.'OGCRUDSettingsController@index',        'as' => 'index']);
            Route::post('/', ['uses' => $namespacePrefix.'OGCRUDSettingsController@store',        'as' => 'store']);
            Route::put('/', ['uses' => $namespacePrefix.'OGCRUDSettingsController@update',       'as' => 'update']);
            Route::delete('{id}', ['uses' => $namespacePrefix.'OGCRUDSettingsController@delete',       'as' => 'delete']);
            Route::get('{id}/move_up', ['uses' => $namespacePrefix.'OGCRUDSettingsController@move_up',      'as' => 'move_up']);
            Route::get('{id}/move_down', ['uses' => $namespacePrefix.'OGCRUDSettingsController@move_down',    'as' => 'move_down']);
            Route::put('{id}/delete_value', ['uses' => $namespacePrefix.'OGCRUDSettingsController@delete_value', 'as' => 'delete_value']);
        });

        // Admin Media
        Route::group([
            'as'     => 'media.',
            'prefix' => 'media',
        ], function () use ($namespacePrefix) {
            Route::get('/', ['uses' => $namespacePrefix.'OGCRUDMediaController@index',              'as' => 'index']);
            Route::post('files', ['uses' => $namespacePrefix.'OGCRUDMediaController@files',              'as' => 'files']);
            Route::post('new_folder', ['uses' => $namespacePrefix.'OGCRUDMediaController@new_folder',         'as' => 'new_folder']);
            Route::post('delete_file_folder', ['uses' => $namespacePrefix.'OGCRUDMediaController@delete', 'as' => 'delete']);
            Route::post('move_file', ['uses' => $namespacePrefix.'OGCRUDMediaController@move',          'as' => 'move']);
            Route::post('rename_file', ['uses' => $namespacePrefix.'OGCRUDMediaController@rename',        'as' => 'rename']);
            Route::post('upload', ['uses' => $namespacePrefix.'OGCRUDMediaController@upload',             'as' => 'upload']);
            Route::post('crop', ['uses' => $namespacePrefix.'OGCRUDMediaController@crop',             'as' => 'crop']);
        });

        // BREAD Routes
        Route::group([
            'as'     => 'bread.',
            'prefix' => 'bread',
        ], function () use ($namespacePrefix) {
            Route::get('/', ['uses' => $namespacePrefix.'OGCRUDBreadController@index',              'as' => 'index']);
            Route::get('{table}/create', ['uses' => $namespacePrefix.'OGCRUDBreadController@create',     'as' => 'create']);
            Route::post('/', ['uses' => $namespacePrefix.'OGCRUDBreadController@store',   'as' => 'store']);
            Route::get('{table}/edit', ['uses' => $namespacePrefix.'OGCRUDBreadController@edit', 'as' => 'edit']);
            Route::put('{id}', ['uses' => $namespacePrefix.'OGCRUDBreadController@update',  'as' => 'update']);
            Route::delete('{id}', ['uses' => $namespacePrefix.'OGCRUDBreadController@destroy',  'as' => 'delete']);
            Route::post('relationship', ['uses' => $namespacePrefix.'OGCRUDBreadController@addRelationship',  'as' => 'relationship']);
            Route::get('delete_relationship/{id}', ['uses' => $namespacePrefix.'OGCRUDBreadController@deleteRelationship',  'as' => 'delete_relationship']);
        });

        // Database Routes
        Route::resource('database', $namespacePrefix.'OGCRUDDatabaseController');

        // Compass Routes
        Route::group([
            'as'     => 'compass.',
            'prefix' => 'compass',
        ], function () use ($namespacePrefix) {
            Route::get('/', ['uses' => $namespacePrefix.'OGCRUDCompassController@index',  'as' => 'index']);
            Route::post('/', ['uses' => $namespacePrefix.'OGCRUDCompassController@index',  'as' => 'post']);
        });

        event(new RoutingAdminAfter());
    });

    //Asset Routes
    Route::get('ogcrud-assets', ['uses' => $namespacePrefix.'OGCRUDController@assets', 'as' => 'ogcrud_assets']);

    event(new RoutingAfter());
});

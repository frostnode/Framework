<?php

Route::group(
    [
        'middleware' => ['web', 'auth'],
        'prefix' => 'settings',
        'namespace' => 'Modules\Settings\Http\Controllers'
    ],
    function () {
        Route::get('/', 'SettingsController@index');
    }
);

<?php

Route::group(
    [
        'middleware' => ['web', 'auth'],
        'prefix' => 'admin/settings',
        'as' => 'admin.settings.',
        'namespace' => 'Modules\Settings\Http\Controllers'
    ],
    function () {
        Route::get('/', 'SettingsController@index')->name('index');
    }
);

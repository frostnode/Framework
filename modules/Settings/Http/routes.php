<?php

Route::group(
    [
        'middleware' => ['web', 'auth'],
        'prefix' => 'admin/administration/settings',
        'as' => 'admin.administration.settings.',
        'namespace' => 'Modules\Settings\Http\Controllers'
    ],
    function () {
        Route::get('/', 'SettingsController@index')->name('index');
    }
);

<?php

Route::group(
    [
        'middleware' => ['web', 'auth'],
        'prefix' => 'admin/administration/modules',
        'as' => 'admin.administration.modules.',
        'namespace' => 'Modules\Module\Http\Controllers'
    ],
    function () {
        Route::get('/', 'ModuleController@index')->name('index');
        Route::resource('module', 'ModuleController', ['only' => [
            'index', 'show', 'update'
        ]]);
    }
);

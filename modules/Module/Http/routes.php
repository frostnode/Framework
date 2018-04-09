<?php

Route::group(
    [
        'middleware' => ['web', 'auth'],
        'prefix' => 'admin/modules',
        'as' => 'admin.modules.',
        'namespace' => 'Modules\Module\Http\Controllers'
    ],
    function () {
        Route::get('/', 'ModuleController@index')->name('index');
        Route::resource('module', 'ModuleController', ['only' => [
            'index', 'show', 'update'
        ]]);
    }
);

<?php

Route::group(
    [
        'middleware' => ['web', 'auth'],
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Modules\Core\Http\Controllers'
    ],
    function () {
        Route::get('/', 'CoreController@index')->name('index');
    }
);

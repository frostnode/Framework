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
        Route::get('/management', 'CoreController@management')->name('management');
        Route::get('/administration', 'CoreController@administration')->name('administration');
    }
);

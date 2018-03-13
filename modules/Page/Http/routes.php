<?php

Route::group(
    [
        'middleware' => 'web',
        'prefix' => 'admin/pages',
        'as' => 'admin.pages.',
        'namespace' => 'Modules\Page\Http\Controllers'
    ],
    function () {
        Route::get('/', 'PageController@index')->name('index');
        Route::resource('page', 'PageController');
    }
);

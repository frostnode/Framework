<?php

Route::group(
    [
        'middleware' => ['web', 'auth'],
        'prefix' => 'admin/management/media',
        'as' => 'admin.management.media.',
        'namespace' => 'Modules\Media\Http\Controllers'
    ],
    function () {
        Route::get('/', 'MediaController@index')->name('index');
        Route::resource('media', 'MediaController');
    }
);

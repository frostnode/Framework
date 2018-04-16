<?php

Route::group(
    [
        'middleware' => ['web', 'auth'],
        'prefix' => 'admin/media',
        'as' => 'admin.media.',
        'namespace' => 'Modules\Media\Http\Controllers'
    ],
    function () {
        Route::get('/', 'MediaController@index')->name('index');
        Route::resource('media', 'MediaController');
    }
);

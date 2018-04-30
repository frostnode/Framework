<?php

Route::group(
    [
        'middleware' => ['web', 'auth'],
        'prefix' => 'admin/administration/users',
        'as' => 'admin.administration.users.',
        'namespace' => 'Modules\User\Http\Controllers'
    ],
    function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/trashed', 'UserController@trashed')->name('index.trashed');
        Route::get('/search', 'UserController@search')->name('index.search');
        Route::resource('user', 'UserController');
    }
);

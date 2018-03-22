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
        Route::get('/trashed', 'PageController@trashed')->name('index.trashed');
        Route::get('/page/select', 'PageController@select')->name('page.select');
        Route::get('/page/create/{id?}', 'PageController@create')->name('page.create');
        Route::get('/page/{page?}/delete', 'PageController@delete')->name('page.delete');
        Route::post('/page/{page?}/restore', 'PageController@restore')->name('page.restore');
        Route::resource('page', 'PageController', ['except' => [
            'index', 'show', 'create'
        ]]);
    }
);

Route::group(
    [
        'middleware' => 'web',
        'prefix' => 'admin/pagetypes',
        'as' => 'admin.pagetypes.',
        'namespace' => 'Modules\Page\Http\Controllers'
    ],
    function () {
        Route::get('/', 'PageTypeController@index')->name('index');
        Route::get('/update/{id?}', 'PageTypeController@update')->name('update');
        Route::resource('pagetype', 'PageTypeController', ['except' => [
            'index', 'create', 'store', 'edit'
        ]]);
    }
);

Route::any('/{slug}', 'Modules\Page\Http\Controllers\PageController@show')
    ->name('page.show')
    ->where('any', '.*');

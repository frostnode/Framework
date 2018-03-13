<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin/pages', 'namespace' => 'Modules\Page\Http\Controllers'], function()
{
    Route::get('/', 'PageController@index')->name('pages');
    Route::get('/page/id/edit', 'PageController@edit')->name('page.edit');
});

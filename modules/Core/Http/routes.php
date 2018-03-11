<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Core\Http\Controllers'], function()
{
    Route::get('/', 'CoreController@index')->name('admin');
    Route::get('edit', 'CoreController@edit')->name('admin.edit');
    Route::get('settings', 'CoreController@settings')->name('admin.settings');
});

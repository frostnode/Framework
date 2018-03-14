<?php

Route::group(['middleware' => 'web', 'prefix' => 'settings', 'namespace' => 'Modules\Settings\Http\Controllers'], function()
{
    Route::get('/', 'SettingsController@index');
});

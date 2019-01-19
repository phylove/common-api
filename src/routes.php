<?php
Route::group(['namespace' => 'Phy\CommonApi\Controllers', 'prefix' => 'api/v1/'], function() {
    Route::post('/login', 'LoginController@doLogin');
    Route::group(['middleware' => 'valid.token'], function (){
        Route::post('/check', function() {
            return [true];
        });
        
        Route::post('/service', 'ServiceController@service');
        Route::post('/logout', 'LoginController@doLogout');
    });
});
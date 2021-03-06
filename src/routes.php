<?php

Route::group(['namespace' => 'Phy\CommonApi\Controllers', 'prefix' => '/api/v1'], function() {
    Route::post('/login', 'LoginController@doLogin');
    Route::group(['middleware' => 'phy.auth'], function (){
        
        Route::post('/service', 'ServiceController@service');
        Route::post('/logout', 'LoginController@doLogout');
        
    });

    Route::post('/service/guest', 'ServiceController@service');
});
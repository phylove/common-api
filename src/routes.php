<?php

Route::group(['namespace' => 'Phy\CommonApi\Controllers', 'prefix' => '/api/v1'], function() {
    Route::post('/login', 'LoginController@doLogin');
    Route::group(['middleware' => 'phy.auth'], function (){
        
        Route::post('/service', 'ServiceController@service');
        Route::post('/logout', 'LoginController@doLogout');
        
    });

    // foreach(config('service.route.get') as $r) {
    //     Route::get($r['path'], function (\Illuminate\Http\Request $request) use ($r){
    //         return \Phy\CoreApi\CallService::execute($request->all(), $r['service']);
    //     });
    // }

});
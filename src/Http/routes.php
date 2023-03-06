<?php


Route::group([
    'namespace' => 'Dkp\Seat\SeatDKP\Http\Controllers',
    'prefix' => 'dkp',
], function () {

    Route::group([
        'middleware' => ['web', 'auth'],
    ], function () {

        Route::get('/', [
            'as' => 'dkp.minelist',
            'uses' => 'DkpController@getMineDkp',
            'middleware' => 'can:dkp.request',
        ]);

        Route::get('/commodityInfo', [
            'as' => 'dkp.commodityInfo',
            'uses' => 'DkpController@getCommodityInfo',
            'middleware' => 'can:dkp.admin',
        ]);

        Route::get('/allScoreDetail/{userId}', [
            'as' => 'dkp.allScoreDetail',
            'uses' => 'DkpController@allScoreDetail',
            'middleware' => 'can:dkp.admin',
        ]);

        Route::get('/useScoreDetail/{userId}', [
            'as' => 'dkp.useScoreDetail',
            'uses' => 'DkpController@useScoreDetail',
            'middleware' => 'can:dkp.admin',
        ]);
    });
});

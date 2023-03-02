<?php


Route::group([
    'namespace' => 'Dkp\Seat\SeatDKP\Http\Controllers',
    'prefix' => 'dkp',
], function () {

    Route::group([
        'middleware' => ['web', 'auth'],
    ], function () {

        Route::get('/', [
            'as' => 'dkp.request',
            'uses' => 'DkpController@getMineDkp',
            'middleware' => 'can:dkp.request',
        ]);
    });
});

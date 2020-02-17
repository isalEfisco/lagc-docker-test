<?php


Route::group([
    'prefix'        => 'auth', 
    'middleware'    => [
        'api',
    ]
], function(){
    Route::post('/login', 'AuthController@login');

    Route::group([
        'middleware'    => [
            'auth:api',
        ]
    ], function(){
        Route::post('/logout', 'AuthController@logout');
        Route::get('/refresh', 'AuthController@refresh');
        Route::get('/me', 'AuthController@me');
    });
});

Route::group([
    'prefix'        => 'registration', 
    'middleware'    => [
        'api',
    ]
], function(){
    Route::get('/check-token', 'RegistrationController@checkInvitationToken');
    Route::post('/confirm-email', 'RegistrationController@confirmEmail');
});

Route::group([
    'prefix'        => 'clinics/{$clinicId}/admins', 
    'middleware'    => [
        'api',
        'auth:api',
    ]
], function(){
    Route::post('/', 'ClinicAdminController@create');
    Route::put('/{id}', 'ClinicAdminController@update');
});

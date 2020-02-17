<?php

Route::group([
    'prefix'        => 'clinics', 
    'middleware'    => [
        'api',
        'auth:api'
    ]
], function(){

    Route::group([
        'middleware'    => [
            'role:admin'
        ]
    ], function(){
        Route::post('/', 'ClinicController@create');
        Route::put('/{clinic_id}', 'ClinicController@update');
    });

    Route::get('/', 'ClinicController@list')
        ->middleware('role:lagc_admin,quality_improvement_admin');

    Route::group([
        'middleware'    => [
            'clinic.access'
        ]
    ], function(){
        Route::get('/{clinic_id}', 'ClinicController@get');
        Route::get('/{clinic_id}/doctors', 'DoctorContoller@getDoctorsByClinic');
        Route::get('/{clinic_id}/admins', 'ClinicController@getAdmins');
    });
});

Route::group([
    'prefix'        => 'doctors', 
    'middleware'    => [
        'api',
        'auth:api'
    ]
], function(){
    Route::get('/{id}', 'DoctorContoller@get');
    Route::post('/', 'DoctorContoller@create');
    Route::put('/{id}', 'DoctorContoller@update');
    Route::delete('/{id}', 'DoctorContoller@delete');
});

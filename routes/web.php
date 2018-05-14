<?php




Route::group(['middleware' => ['web']], function () {


    Route::get('/', ['as' => 'index', 'uses' => 'BallGame@index']);
    Route::post('/formSubmit', ['as' => 'formSubmit', 'uses' => 'BallGame@formSubmit']);


});
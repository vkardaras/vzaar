<?php

Route::group(['namespace' => 'Vkardaras\Vzaar\Http\Controllers'], function() {

	Route::get('stream', 'VzaarController@index')->name('stream');
	Route::get('videos', 'VzaarController@videos');

	// Route::post('stream', 'VzaarController@send');
});

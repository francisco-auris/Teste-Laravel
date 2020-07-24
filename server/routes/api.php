<?php
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

// routes of category
Route::get('categories', 'CategoryController@index'); // [ X ]
Route::post('category', 'CategoryController@store'); // [ X ]
Route::put('category/{id}', 'CategoryController@update'); // [ X ]

// routes of video
Route::get('videos', 'VideoController@index'); // [ X ]
Route::get('videos-category/{id}', 'VideoController@videoPerCategory'); // [ X ]
Route::post('video', 'VideoController@store'); // [ X ]
Route::put('video/{id}', 'VideoController@update'); // [ ]

//routes of comments
Route::get('comments/{id}', 'CommentController@index'); // [ X ]
Route::post('comment', 'CommentController@store'); // [ X ]
Route::delete('comment/{id}', 'CommentController@destroy'); // [ X ]

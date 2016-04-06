<?php

Route::controller('/user','UserController');
Route::controller('/session','SessionController');
Route::controller('/album','AlbumController');
Route::controller('/status','StatusController');
Route::controller('/blog','BlogController');
Route::controller('/comment','CommentController');
Route::controller('/like','LikeController');
// Route::filter('check-user',function(){
// 	if (!Session::has($user)) {
// 		return Redirect::to('/');
// 	}
// })
// Route::group(array('before' => 'check-user'),function(){})
Route::get('{user}', 'UserController@Profile');
Route::get('{user}/info', 'UserController@Info');
Route::get('{user}/photo', 'AlbumController@Photo');
Route::get('{user}/photo/album', 'AlbumController@Album');
Route::get('{user}/photo/album/{album_id}', 'AlbumController@Album_detail');
Route::get('{user}/blog', 'UserController@Blog');
Route::get('{user}/friend', 'UserController@Friend');
Route::get('{user}/message', 'UserController@Message');
Route::controller('/','ViewController');


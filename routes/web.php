<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::get('/getupdates','BotController@getupdates');
route::get('/setwebhook','BotController@setwebhook');
// route::post('/getupdatesbywebhook','BotController@getupdatesbywebh
// 	ook');











//telegram sdk routes

// use Log;

route::get('/getme','TelegramBotController@getme');
route::get('/setwebhook','TelegramBotController@setwebhook');
route::post('/getupdatesbywebhook','TelegramBotController@getupdatesbywebhook')->name("mywebhook");

Route::post('/getupdatesbywebhook', function () {
 
 $update=Telegram::commandsHandler(true);


if($update["message"]["text"]==="/start"){


	// log::info($update["message"]["text"]);


// log::info(App\User::all());


}
	
 


});
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use DB;

use App\TeleRegistration;


class BotController extends Controller
{
   public function getUpdates()
   {


   	$token=env('TELEGRAM_BOT_TOKEN');

   	$method="/getupdates";

   	$url="https://api.telegram.org/bot".$token;

   	$update=file_get_contents($url.$method);

   	$update_array=json_decode($update,true);

   	$chat_id=$update_array["result"][0]["message"]["chat"]["id"];

   	
   	$method="/sendmessage?chat_id=".$chat_id."&text=welcome to laravel nigga";

   	$message=file_get_contents($url.$method);



   	print_r($message);




   }


public function setWebhook()
{

	  $token=env('TELEGRAM_BOT_TOKEN');

   	$method="/setWebhook?url=https://7d782715.ngrok.io/getupdatesbywebhook";

   	$url="https://api.telegram.org/bot".$token;

   	$update=file_get_contents($url.$method);

   	print_r($update);








}








public function getUpdatesbywebhook()
{

 
  $keyboard = '[
        {"text":"Clarin","callback_data":"clarin"},
        {"text":"La Nacion","callback_data":"La Nacion"},
        {"text":"Ambas","callback_data":"Ambas"}
        ]';


    $token=env('TELEGRAM_BOT_TOKEN');



   	$url="https://api.telegram.org/bot".$token;

   	$update=file_get_contents('php://input'); // for webhook;

    
   
   	$update_array=json_decode($update,true);



      if ($update_array['message']!= null) {

    log::info($update_array["message"]["chat"]["id"]);


                         }

 else if ($update_array['callback_query'] !=null) {
     
                   
     log::info($update_array["call_back_query"]);

      }


     $chat_id=$update_array["message"]["chat"]["id"];


$message = 'welcome to my new bot';
$args = [
    'chat_id' => $chat_id,
    'parse_mode' => 'HTML',
    'text' => 'Inline Keyboard',
    'reply_markup' => [
        'inline_keyboard' => [
            [
                [
                    'text' => 'Try me',
                ]
            ]
        ]
    ]
];

$parameter = array(
      'chat_id' => $chat_id, 
      'text' =>$message,
      'reply_markup' => '{"inline_keyboard":['.$keyboard.'], "resize_keyboard":true, "one_time_keyboard":true}',
      

      );





$request_url = $url.'/sendMessage?'.http_build_query($parameter);

return file_get_contents($request_url);






         













}














}

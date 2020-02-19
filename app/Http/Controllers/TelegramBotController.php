<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;
use Log;

class TelegramBotController extends Controller
{
    

public function getme(){





$response =Telegram::getMe();
dd($response);


}


public function setwebhook(){

$token=env('TELEGRAM_BOT_TOKEN');

   

$url="https://41e73972.ngrok.io/.$token/getupdatesbywebhook";

   

$response=Telegram::setwebhook(["url"=>$url]);
dd($response);

}


public function getupdatesbywebhook()
{

 $update=$telegram->commandsHandler(true);
	
 $update=file_get_contents('php://input');

    
   
$update_array=json_decode($update,true);



 //      if ($update_array['message']!= null) {

 //      log::info($update_array["message"]["chat"]["id"]);


 //                         }

 // else if ($update_array['callback_query'] !=null) {
     
                   
 //     log::info($update_array["call_back_query"]);

 //      }


 $chat_id=$update_array["message"]["chat"]["id"];


// $message = 'welcome to my new bot sdk';


// $parameter = array(
//       'chat_id' =>389387515,
//       'text' =>$message,
      
      

//       );





// $request_url = $url.'/sendMessage?'.http_build_query($parameter);

// return file_get_contents($request_url);















$response = Telegram::sendMessage([
  'chat_id' =>$chat_id,
  'text' => 'Hello World'
]);









$messageId = $response->getMessageId();

log::info($messageId);

}












}

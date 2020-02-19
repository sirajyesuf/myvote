<?php

namespace App\Http\Controllers;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Log;
use App\User;
class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "start";

    protected $description = "Start Command to get you started";

    
    public function handle($arguments)
    {
        
          log::info(getTelegram());

        $this->replyWithMessage(['text' => 'Hello! Welcome to our bot, Here are our available commands:']);

        
    }

}
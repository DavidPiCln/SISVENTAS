<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('.*', function ($botman) {
            $this->startConversation($botman);
        });

        $botman->listen();
    }

    public function startConversation($botman)
    {
        $botman->startConversation(new AskNameConversation());
    }
}

class AskNameConversation extends Conversation
{
    protected $name;

    public function askName()
    {
        $this->ask('Hola! Cual es tu nombre?', function (Answer $answer) {
            $this->name = $answer->getText();
            $this->askEmail();
        });
    }

    public function askEmail()
    {
        $this->ask('Muy bien, gracias ' . $this->name . '! Cual es su correo?', function (Answer $answer) {
            $email = $answer->getText();
            $this->say('Gracias, nos comunicaremos con usted lo antes posible');
        });
    }

    public function run()
    {
        $this->askName();
    }
}